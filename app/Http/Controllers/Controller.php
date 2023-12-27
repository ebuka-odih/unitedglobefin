<?php

namespace App\Http\Controllers;

use App\Mail\AdminNewAcctAlert;
use App\Mail\NewAccount;
use App\Models\Account;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function autoCreate($user_id, $account_type, $currency){
        $accounts = Account::orderBy('created_at', 'desc')->first();
        if($accounts){
            $last_account_num = $accounts->account_number ;
        }else {
            $last_account_num = '10604802003';
        }

        $account_num = (int)$last_account_num + 1;

        Account::create(['user_id' => $user_id, 'account_number' => $account_num,
            'account_type' => $account_type, 'currency' => $currency]);


//        Mail::to($user->email)->send( new NewAccount($data));
//        Mail::to($admin->email)->send( new AdminNewAcctAlert($data));
    }
}
