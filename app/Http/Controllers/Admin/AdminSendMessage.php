<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\MessageSent;
use App\Models\SendMessage;
use App\Models\User;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminSendMessage extends Controller
{

    public function messages()
    {
        $messages = SendMessage::all();
        $users = User::all();
        return view('admin.send-message', compact('messages', 'users'));
    }

    public function storeMessage(Request $request)
    {
        $message = new SendMessage();
        $message->user_id = $request->user_id;
        $message->title = $request->title;
        $message->message = $request->message;
        $message->save();
//        Mail::to($message->user->email)->send(new MessageSent($message));
        return redirect()->back()->with('success', "Message sent successfully");

    }

    public function deleteMessage($id)
    {
        $message = SendMessage::findOrFail($id);
        $message->delete();
        return redirect()->back()->with('success', "Message Deleted");
    }
}
