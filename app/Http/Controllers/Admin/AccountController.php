<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function createAccount()
    {
        return view('admin.user.add-user');
    }

    public function storeAccount(Request $request)
    {
        $data = $this->getData($request);
        $data['password'] = Hash::make($request['password']);
        $data['pass'] = $request->password;
        $data = User::create($data);
        return redirect()->route('admin.accountSetup', $data->id)->with('success', "Please fill out the info below to setup your account");
    }

    public function accountSetup($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.acct-setup', compact('user'));
    }

    public function storeAccountSetup(Request $request)
    {
        $request->validate([
            'identification_type' => 'required|string|max:255',
            'id_expiry' => 'required|string|max:255',
            'id_number' => 'required|string|max:255',
            'id_front_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_back_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload and store the first image
        if ($request->hasFile('id_front_img')) {
            $image = $request->file('id_front_img');
            $input1['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $image->move($destinationPath, $input1['imagename']);
        }
        // Upload and store the second image
        if ($request->hasFile('id_back_img')) {
            $image = $request->file('id_back_img');
            $input2['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $image->move($destinationPath, $input2['imagename']);
        }
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $input3['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $image->move($destinationPath, $input3['imagename']);
        }
        $id = $request->user_id;
        $user = User::findOrFail($id);
        $user->identification_type = $request->identification_type;
        $user->id_number = $request->id_number;
        $user->id_expiry = $request->id_expiry;
        $user->id_front_img = $input1['imagename'];
        $user->id_back_img = $input2['imagename'];
        $user->avatar = $input3['imagename'];
        $user->save();

        $this->autoCreate($user->id, $request['account_type'], $request['currency']);
        return redirect()->route('admin.viewUser', $user->id);
    }

    protected function getData(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'username' => ['required', 'string', 'unique:users', 'alpha_dash', 'min:3', 'max:30'],
            'email' => 'required',
            'title' => 'required',
            'date_of_birth' => 'required',
            'country' => 'nullable',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'employment' => 'required',
            'source_of_income' => 'required',
            'citizenship' => 'required',
            'ss_code' => 'nullable',
            'confirm_ss_code' => 'nullable',
        ];
        return $request->validate($rules);
    }

    public function editInfo($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit-info', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $this->getUpdateData($request);
        $user->update($data);
        return redirect()->back()->with('success', 'Profile Updated Successful');
    }

    protected function getUpdateData(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'email' => 'nullable',
            'title' => 'nullable',
            'date_of_birth' => 'nullable',
            'country' => 'nullable',
            'state' => 'nullable',
            'city' => 'nullable',
            'address' => 'nullable',
            'zipcode' => 'nullable',
            'phone' => 'nullable',
            'gender' => 'nullable',
            'marital_status' => 'nullable',
            'employment' => 'nullable',
            'source_of_income' => 'nullable',
            'citizenship' => 'nullable',
            'ss_code' => 'nullable',
            'confirm_ss_code' => 'nullable',
        ];

        return $request->validate($rules);
    }

    public function editAccountSetup($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit-account-setup', compact('user'));
    }

    public function updateAccountSetup(Request $request)
    {
        $request->validate([
            'identification_type' => 'nullable|string|max:255',
            'id_expiry' => 'nullable|string|max:255',
            'id_number' => 'nullable|string|max:255',
            'id_front_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_back_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $id = $request->user_id;
        $user = User::findOrFail($id);

        // Upload and store the first image
        if ($request->hasFile('id_front_img')) {
            $image = $request->file('id_front_img');
            $input1['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $image->move($destinationPath, $input1['imagename']);

            $user->id_front_img = $input1['imagename'];
            $user->save();
            return redirect()->back()->with('success', "User Account info updated successfully");
        }
        // Upload and store the second image
        if ($request->hasFile('id_back_img')) {
            $image = $request->file('id_back_img');
            $input2['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $image->move($destinationPath, $input2['imagename']);

            $user->id_back_img = $input2['imagename'];
            $user->save();
            return redirect()->back()->with('success', "User Account info updated successfully");
        }
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $input3['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $image->move($destinationPath, $input3['imagename']);

            $user->avatar = $input3['imagename'];
            $user->save();
            return redirect()->back()->with('success', "User Account info updated successfully");
        }

        $user->identification_type = $request->identification_type;
        $user->id_number = $request->id_number;
        $user->id_expiry = $request->id_expiry;
        $user->save();
        $account = Account::whereUserId($user->id);
        $account->update(['currency' => $request->currency, 'account_type' => $request->account_type]);
        return redirect()->back()->with('success', "User Account info updated successfully");
    }

    public function userChangePassword($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.change-password', compact('user'));
    }

    public function userStorePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find($request->user_id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect()->back()->with('success', "Password Updated Successfully");
    }

}
