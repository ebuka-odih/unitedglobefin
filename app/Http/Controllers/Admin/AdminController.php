<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddFund;
use App\Models\DebitCard;
use App\Models\Transfer;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all()->count();
        $transfer = Transfer::select('amount')->sum('amount');
        $deposits = AddFund::select('amount')->sum('amount');
        return view('admin.index', compact('users', 'transfer', 'deposits'));
    }

    public function password()
    {
        return view('admin.security');
    }

    public function storePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect()->back()->with('success', "Password Updated Successfully");
    }

}
