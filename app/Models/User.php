<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $guarded = [];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    public function getAvatarAttribute($value) {
//        if(!$this->attributes['avatar']) {
//            $colors = ['E91E63', '9C27B0', '673AB7', '3F51B5', '0D47A1', '01579B', '00BCD4', '009688', '33691E', '1B5E20', '33691E', '827717', 'E65100',  'E65100', '3E2723', 'F44336', '212121'];
//            $background = $colors[$this->id%count($colors)];
//            return "https://ui-avatars.com/api/?size=256&background=".$background."&color=fff&name=".urlencode($this->first_name .' '. $this->last_name);
//        }
//        return '/avatars/' . $this->attributes['avatar'];
//    }

    public function account(){
        return $this->hasOne(Account::class, 'user_id');
    }

    public function addfund(){
        return $this->hasMany(AddFund::class, 'user_id');
    }
    public function debit(){
        return $this->hasMany(DebitFund::class, 'user_id');
    }
    public function send_message(){
        return $this->hasMany(SendMessage::class, 'user_id');
    }

    public function fullname()
    {
        return $this->first_name.' '.$this->middle_name.' '.$this->last_name;
    }

    public function status()
    {
        if ($this->status > 4){
            return "<span class='badge bg-success'>Active</span>";
        }elseif($this->status == 1){
            return "<span class='badge bg-warning'>OnHold</span>";
        }
        elseif($this->status == 2){
            return "<span class='badge bg-info'>Dormant</span>";
        }
        elseif($this->status == 3){
            return "<span class='badge bg-danger'>Frozen</span>";
        }
        else{
            return "<span class='badge bg-danger'>InActive</span>";
        }
    }

    public function bypass_code()
    {
        if ($this->bypass_code == 1)
        {
            return "Yes";
        }
        return "No";
    }
    public function sendMail()
    {
        if ($this->send_email == 1)
        {
            return "Yes";
        }
        return "No";
    }


}
