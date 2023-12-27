<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function status()
    {
        if ($this->status == 1)
        {
            return "<strong class='badge rounded-pill bg-success'>Successful</strong>";
        }elseif($this->status == 0)
        {
            return "<strong class='badge rounded-pill bg-warning'>Pending</strong>";
        }
        return "<strong class='badge rounded-pill bg-danger'>Canceled</strong>";

    }

    public function transId()
    {
        return '#D76462352445G'.$this->id;
    }

    public function type()
    {
        if ($this->debit_inflow = 1)
        {
            return "Debit";
        }
        return "Credit";
    }


}
