<?php

namespace App\Http\Controllers;

use App\Mail\CreditAlert;
use App\Mail\DebitAlert;
use App\Models\Account;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use function Symfony\Component\String\u;

class TransferController extends Controller
{
    public function transfer()
    {
        return view('dashboard.transfer.transfer');
    }

    public function transferHistory()
    {
        $transactions = Transfer::whereUserId(\auth()->id())->latest()->paginate(10);
        return view('dashboard.transfer.transactions', compact('transactions'));
    }

    public function storeTransfer(Request $request)
    {
        if ($request->amount > auth()->user()->account->balance){
            return redirect()->back()->with('error', "Insufficient Balance");
        }

        $data = $this->getData($request);
        $data['user_id'] = Auth::id();
        $data['account_id'] = Auth::user()->account->id;
        $data = Transfer::create($data);
        $transfer = Transfer::findOrFail($data->id);
        if (\auth()->user()->bypass_code == 1){
            $new_balance = Account::findOrFail($transfer->account_id);
            $new_balance->balance -= $transfer->amount;
            $new_balance->save();
            $transfer->status = 1;
            $transfer->debit_inflow = true;
            $transfer->save();

            //send mail
            $user = Auth::user();
            $data = ['user' => $user, 'transfer' => $transfer];
            Mail::to($user->email)->send(new DebitAlert($data));
            Mail::to($transfer->ben_email)->send(new CreditAlert($data));
            return redirect()->route('user.transferSuccess', $transfer->id);
        }
        return redirect()->route('user.firstCode', $data->id);

    }

    public function firstCode($id)
    {
        $transfer = Transfer::findOrFail($id);
        return view('dashboard.transfer.first-code', compact('transfer'));
    }

    public function storeFirstCode(Request $request)
    {
        $transfer = Transfer::findOrFail($request->transfer_id);
        if ($request->first_code == \auth()->user()->admin_first_code)
        {
            $transfer->first_code = $request->first_code;
            $transfer->save();
            return redirect()->route('user.secondCode', $transfer->id);
        }
        return redirect()->back()->with('error', "Invalid Code, Please enter the correct code.");
    }

    public function secondCode($id)
    {
        $transfer = Transfer::findOrFail($id);
        return view('dashboard.transfer.second-code', compact('transfer'));
    }


    public function storeSecondCode(Request $request)
    {
        $transfer = Transfer::findOrFail($request->transfer_id);
        if ($request->second_code == \auth()->user()->admin_second_code)
        {
            $transfer->second_code = $request->second_code;
            $transfer->save();
            return redirect()->route('user.thirdCode', $transfer->id);
        }
        return redirect()->back()->with('error', "Invalid Code, Please enter the correct code.");
    }

    public function thirdCode($id)
    {
        $transfer = Transfer::findOrFail($id);
        return view('dashboard.transfer.third-code', compact('transfer'));
    }

    public function storeThirdCode(Request $request)
    {
        $transfer = Transfer::findOrFail($request->transfer_id);
        if ($request->third_code == \auth()->user()->admin_third_code)
        {
            $transfer->third_code = $request->third_code;
            $transfer->status = 1;
            $transfer->debit_inflow = true;
            $transfer->save();
            if ($transfer->status == 1)
            {
                $new_balance = Account::findOrFail($transfer->account_id);
                $new_balance->balance -= $transfer->amount;
                $new_balance->save();

                //send mail
                $user = Auth::user();
                $data = ['user' => $user, 'transfer' => $transfer];
                Mail::to($user->email)->send(new DebitAlert($data));
                Mail::to($transfer->ben_email)->send(new CreditAlert($data));
            }
            return redirect()->route('user.transferSuccess', $transfer->id);
        }
        return redirect()->back()->with('error', "Invalid Code, Please enter the correct code.");
    }

    public function transferSuccess($id)
    {
        $transfer = Transfer::findOrFail($id);
        if (\auth()->user()->bypass_code)
        {
            return view('dashboard.transfer.transfer-success', compact('transfer'));
        }

        if ( $transfer->first_code == null){
            return redirect()->route('user.firstCode', $transfer->id);
        }elseif ($transfer->second_code == null)
        {
            return redirect()->route('user.secondCode', $transfer->id);
        }elseif ($transfer->third_code == null)
        {
            return redirect()->route('user.thirdCode', $transfer->id);
        }
        return view('dashboard.transfer.transfer-success', compact('transfer'));

    }

    protected function getData(Request $request)
    {
        $rules = [
            'from' => 'required',
            'ben_bank' => 'required',
            'acct_number' => 'required',
            'amount' => 'required',
            'ben_name' => 'required',
            'ben_email' => 'required',
            'ben_country' => 'required',
            'ben_address' => 'required',
            'routing_number' => 'required',
            'note' => 'nullable',
        ];
        return $request->validate($rules);
    }

}
