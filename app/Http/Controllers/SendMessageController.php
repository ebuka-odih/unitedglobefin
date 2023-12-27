<?php

namespace App\Http\Controllers;

use App\Models\SendMessage;
use Illuminate\Http\Request;

class SendMessageController extends Controller
{
    public function messages()
    {
        $messages = SendMessage::whereUserId(auth()->id())->latest()->get();
        return view('dashboard.messages', compact('messages'));
    }

    public function viewMessage($id)
    {
        $message = SendMessage::findOrFail($id);
        $message->read = 1;
        $message->save();
        return view('dashboard.message-details', compact('message'));
    }
}
