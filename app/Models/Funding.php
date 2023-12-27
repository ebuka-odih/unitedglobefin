<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funding extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        if ($this->status < 0)
        {
            return "<span class='badge rounded-pill bg-danger'>Declined</span>";
        }
        elseif($this->status == 0)
        {
            return "<span class='badge rounded-pill bg-warning'>Pending</span>";
        }
        return "<span class='badge rounded-pill bg-success'>Successful</span>";
    }


    public function type()
    {
        if ($this->type == 1)
        {
            return "Debit";
        }
        return "Credit";
    }

}
