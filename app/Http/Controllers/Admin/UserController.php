<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transfer;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users()
    {
        $users = User::all();

        return view('admin.user.list', compact('users'));
    }

    public function viewUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.user-detail', compact('user'));
    }
    public function userSetting($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.user-setting', compact('user'));
    }
    public function storeUserSetting(Request $request)
    {
        $id = $request->user_id;
        $user = User::findOrFail($id);
        $user->bypass_code = $request->bypass_code;
        $user->send_email = $request->send_email;
        $user->admin_first_code = $request->admin_first_code;
        $user->admin_second_code = $request->admin_second_code;
        $user->admin_third_code = $request->admin_third_code;
        $user->save();
        return redirect()->back()->with('success', 'setting saved');
    }

    public function userStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->status = $request->status;
        $user->save();
        return redirect()->back()->with('success', "User Status Updated Successfully");
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', "User Deleted Successfully");
    }
}
