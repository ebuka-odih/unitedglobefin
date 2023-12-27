<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transfer;
use Illuminate\Http\Request;

class AdminInternalTransferController extends Controller
{
    public function internalTransfer()
    {
        $transfer = Transfer::all();
        return view('admin.transactions.internal-transfer', compact('transfer'));
    }


}
