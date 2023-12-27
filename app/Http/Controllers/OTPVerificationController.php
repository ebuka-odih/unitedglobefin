<?php

namespace App\Http\Controllers;

use App\Notifications\UserOTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use function App\Http\Requests\Auth\generateOTP;


class OTPVerificationController extends Controller
{
    public function show()
    {
        return view('pages.signup.otp-verification');
    }

    public function verify(Request $request)
    {
        $user = Auth::user();
        if ($user && $user->otp_code == $request->otp) {
            $user->otp_code = null;
            $user->save();

            if ( Auth::user() &&  Auth::user()->admin == 1) {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('user.dashboard');

        } else {
            return back()->with('error', 'Invalid OTP code. Please try again.');
        }
    }



    public function sendOTP()
    {
        // Generate a new OTP code
        $user = Auth::user();
        $otpCode = $this->generateOTP();

        // Store the OTP code in the user's profile (e.g., in the database)
        $user->otp_code = $otpCode;
        $user->save();
        Notification::route('mail', $user->email)->notify(new UserOTP($user));
        return redirect()->back()->with('success', "OTP has been sent to your email");
    }

    private function generateOTP($length = 6)
    {
            return Str::random($length);
    }

}
