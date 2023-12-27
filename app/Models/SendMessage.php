<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendMessage extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        if ($this->read == 1){
            return "<span class='badge bg-success'>Read</span>";
        }else{
            return "<span class='badge bg-danger'>Not Read</span>";
        }
    }

}
