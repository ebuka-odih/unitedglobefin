<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transfer;
use App\Models\User;
use App\Notifications\FirstCode;
use App\Notifications\SecondCode;
use App\Notifications\ThirdCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AdminTransferController extends Controller
{
   public function transfers()
   {
       $transfer = Transfer::all();
       return view('admin.transactions.transfer', compact('transfer'));
   }

    public function adminFirstCode(Request $request)
    {
        $id = $request->transfer_id;
        $transfer = Transfer::findOrFail($id);
        $transfer->admin_first_code = $request->admin_first_code;
        $transfer->save();
        $user = User::findOrFail($transfer->user_id);

        $data = ['user' => $user, 'transfer' => $transfer];
        Notification::route('mail', $user->email)->notify(new FirstCode($data));
        return redirect()->back()->with('success', "Code Sent Successfully");
    }

    public function adminSecondCode(Request $request)
    {
        $id = $request->transfer_id;
        $transfer = Transfer::findOrFail($id);
        $transfer->admin_second_code = $request->admin_second_code;
        $transfer->save();
        $user = User::findOrFail($transfer->user_id);

        $data = ['user' => $user, 'transfer' => $transfer];
        Notification::route('mail', $user->email)->notify(new SecondCode($data));
        return redirect()->back()->with('success', "Code Sent Successfully");
    }

    public function adminThirdCode(Request $request)
    {
        $id = $request->transfer_id;
        $transfer = Transfer::findOrFail($id);
        $transfer->admin_third_code = $request->get('admin_third_code');
        $transfer->save();
        $user = User::findOrFail($transfer->user_id);

        $data = ['user' => $user, 'transfer' => $transfer];
        Notification::route('mail', $user->email)->notify(new ThirdCode($data));
        return redirect()->back()->with('success', "Code Sent Successfully");
    }

    public function viewTransfer($id)
    {
        $transfer = Transfer::findOrFail($id);
        return view('admin.transactions.view-transfer', compact('transfer'));
    }

    public function deleteTransfer($id)
    {
        $transfer = Transfer::findOrFail($id);
        $transfer->delete();
        return redirect()->back()->with('success', 'Transaction Deleted');
    }

}
