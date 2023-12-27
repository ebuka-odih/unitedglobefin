<?php

namespace App\Http\Controllers;

use App\Mail\AdminNewAcctAlert;
use App\Mail\NewAccount;
use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;


class NewAccountController extends Controller
{
    public function personalInfo()
    {
        return view('pages.signup.personal-info');
    }

    public function storeAccountInfo(Request $request)
    {
        $data = $this->getData($request);
        $data['password'] = Hash::make($request['password']);
        $data['pass'] = $request->password;
        $data = User::create($data);
        return redirect()->route('accountSetup', $data->id)->with('success', "Please fill out the info below to setup your account");
    }

    public function accountSetup($id)
    {
        $user = User::findOrFail($id);
        return view('pages.signup.account-setup', compact('user'));
    }

    public function terms($id)
    {
        $user = User::findOrFail($id);
        return view('pages.signup.terms', compact('user'));
    }
    public function accountReview($id)
    {
        $user = User::findOrFail($id);
        return view('pages.signup.review', compact('user'));
    }
    public function submitDetails($id)
    {
        $user = User::findOrFail($id);
        $admin = User::where('admin', 1)->first();
        Mail::to($user->email)->send( new NewAccount($user));
        Mail::to($admin->email)->send( new AdminNewAcctAlert($user));
        return redirect()->route('acctPending', $user->id);
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

        $id = $request->user_id;
        $user = User::findOrFail($id);

        // Helper function to handle image uploads
        $this->uploadImage($request->file('id_front_img'), 'id_front_img', $user);
        $this->uploadImage($request->file('id_back_img'), 'id_back_img', $user);
        $this->uploadImage($request->file('avatar'), 'avatar', $user);

        // Database transaction to ensure data consistency
        DB::beginTransaction();

        try {
            $user->identification_type = $request->identification_type;
            $user->id_number = $request->id_number;
            $user->id_expiry = $request->id_expiry;
            $user->save();

            $this->autoCreate($user->id, $request['account_type'], $request['currency']);

            // Commit the transaction if everything is successful
            DB::commit();
        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollback();

            // Handle the exception
            // You might want to log the error or display a user-friendly message
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }

        return redirect()->route('terms', $user->id);
    }

// Helper function to handle image uploads
    private function uploadImage($file, $fieldName, $user)
    {
        $imageName = time() . '_' . $file->getClientOriginalName();
        $destinationPath = public_path('/files');
        $file->move($destinationPath, $imageName);
        $user->$fieldName = $imageName;
    }


    protected function getData(Request $request)
    {
        $rules = [
          'first_name' => 'required',
          'middle_name' => 'nullable',
          'last_name' => 'required',
          'username' => ['required', 'string', 'unique:users', 'alpha_dash', 'min:3', 'max:30'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
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
}
