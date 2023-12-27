<?php

namespace App\Http\Controllers;

use App\Mail\CreditAlert;
use App\Mail\DebitAlert;
use App\Models\Account;
use App\Models\Transfer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class InternalTransferController extends Controller
{
    public function internalTransfer()
    {
        return view('dashboard.transfer.internal-transfer');
    }

    public function confirmDetail(Request $request)
    {
        $account_number = $request->input('acct_number');
        $user_acct = Account::where('account_number', $account_number)->first();
        if ($user_acct)
        {
            if ($account_number != auth()->user()->account->account_number){
                $transfer = new Transfer();
                $transfer->amount = $request->amount;
                $transfer->acct_number = $request->acct_number;
                $transfer->from = $request->from;
                $transfer->save();
                return view('dashboard.transfer.confirm-internal-transfer', compact('user_acct', 'transfer'));
            }
            else{
                return redirect()->back()->with('error', 'Illicit Transaction');
            }
        }
        return redirect()->back()->with('error', "Sorry! No Such Account Number");

    }



    public function storeInternalTransfer(Request $request)
    {
        $id = $request->transfer_id;
        $transfer = Transfer::findOrFail($id);
        $transfer->note = $request->note;
        $transfer->save();
        return redirect()->route('user.firstCode', $transfer->id);
    }

    public function firstCode($id)
    {
        $transfer = Transfer::findOrFail($id);
        return view('dashboard.transfer.first-code', compact('transfer'));
    }

    public function storeFirstCode(Request $request)
    {
        $transfer = Transfer::findOrFail($request->transfer_id);
        if ($request->first_name == $transfer->admin_first_code)
        {
            $transfer->first_code = $request->first_code;
            $transfer->internal_transfer = 1;
            $transfer->account_id = Auth::user()->account->id;
            $transfer->user_id = Auth::id();
            $transfer->debit_inflow = true;
            $transfer->status = 1;
            $transfer->save();

            $user = Auth::user();
            $user->account->balance -= $transfer->amount;
            $user->save();

            $credit = new Transfer();
            $credit->credit_inflow = true;
            $receiver = Account::where('account_number', $transfer->acct_number)->first();
            $credit->user_id = $receiver->user->id;
            $credit->account_id = $receiver->id;
            $receiver->balance += $transfer->amount;
            $receiver->save();
            $credit->save();

            //send mail
            $data = ['transfer' => $transfer, 'credit' => $credit];
            $sender = Auth::user();
            Mail::to($sender->email)->send(new DebitAlert($data));
            Mail::to($receiver->user->email)->send(new CreditAlert($data));
            return view('dashboard.transfer-receipt', compact('transfer'));
        }
        return redirect()->back()->with('error', 'You entered a wrong code');
    }

    public function nsb_code($id)
    {
        $transfer = Transfer::findOrFail($id);
        return view('dashboard.transfer.nsb_code', compact('transfer'));
    }

    protected function getNsbData(Request $request)
    {
        $rules = [
            'amount' => 'required',
            'acct_number' => 'required',
            'from' => 'required',
        ];
        return $request->validate($rules);
    }


}
