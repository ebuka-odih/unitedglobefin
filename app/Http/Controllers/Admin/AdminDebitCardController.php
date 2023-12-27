<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DebitCard;
use Illuminate\Http\Request;

class AdminDebitCardController extends Controller
{
    public function cards()
    {
        $cards = DebitCard::all();
        return view('admin.card.list', compact('cards'));
    }

    public function approveCard($id)
    {
        $card = DebitCard::findOrFail($id);
        $card->status = 1;
        $card->save();
        return redirect()->back();
    }

    public function deleteCard($id)
    {
        $card = DebitCard::findOrFail($id);
        $card->delete();
        return redirect()->back();
    }
}
