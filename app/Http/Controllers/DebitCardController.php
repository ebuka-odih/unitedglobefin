<?php

namespace App\Http\Controllers;

use App\Mail\CardRequest;
use App\Models\DebitCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DebitCardController extends Controller
{
    public function index()
    {
        $cards = DebitCard::whereUserId(\auth()->id())->latest()->paginate();
        return view('dashboard.card.card', compact('cards'));
    }

    public function create()
    {
        return view('dashboard.card.create');
    }

    public function store(Request $request)
    {
        $data = $this->getData($request);
        $data['user_id'] = Auth::id();
        $card = DebitCard::create($data);
        $user = Auth::user();

        $data = ['card' => $card, 'user' => $user];
        Mail::to($card->user->email)->send( new CardRequest($data));
        return redirect()->route('user.card.index')->with('success', 'Request Sent Successful');
    }


    protected function getData(Request $request)
    {
        $rules = [
            'nickname' => "required",
            'card_type' => "required",
            'note' => "nullable",
        ];
        return $request->validate($rules);
    }
}
