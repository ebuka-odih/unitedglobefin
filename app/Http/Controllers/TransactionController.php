<?php

namespace App\Http\Controllers;

use App\Models\Funding;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transactions()
    {
        $transactions = Funding::whereUserId(auth()->id())->get();
        return view('dashboard.transactions', compact('transactions'));
    }
}
