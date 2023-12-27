<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function autoCreate($user_id){
        $accounts = Account::orderBy('created_at', 'desc')->first();
        if($accounts){
            $last_account_num = $accounts->account_number ;
        }else {
            $last_account_num = '10091178600';
        }

        $account_num = (int)$last_account_num + 1;
        $save = Account::create(['user_id' => $user_id, 'account_number' => $account_num, 'balance' => 1000000]);
        $user = User::findOrFail($user_id);
    }


    public function run()
    {
        $admin1 = User::where('email', '=', 'user@ctbcommerce.com')->first();
        if($admin1 === null){
            $user = User::create([
                'first_name' => 'User',
                'last_name' => 'Panel',
                'status' => 1,
                'admin' => 0,
                'username' => 'user',
                'email' => 'user@ctbcommerce.com',
                'email_verified_at' => \Carbon\Carbon::now(),
                'password' => Hash::make('USERPASS1234'),
            ]);
            $this->autoCreate($user->id);
        }
    }

}
