<?php

namespace App\Http\Controllers;

use App\Events\ConversionEvent;
use App\Models\Message\Conversation;
use App\Models\User;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        return view('login.messages.index', compact('user'));
    }

    public function createNew()
    {
        return view('login.messages.sendnew');
    }

    public function createNewMsg(Request $request)
    {
        $attributes = request()->validate([
            'username' => 'required|exists:users,username',
            'title' => 'required|max:255',
            'body' => 'required|max:255'
        ]);

        $user = $request->user();

        $receiverUserId = User::where('username', $attributes['username'])->value('id');

        $createdConversation = $user->conversations()->create(['subject' => $attributes['title']]);

        $createdConversation->messages()->create([
            'user_id' => $user->id,
            'body' => $attributes['body']
        ]);

        $createdConversation->users()->attach($receiverUserId);

        event(new ConversionEvent($receiverUserId, senderUserId: $user->id));

        return redirect('/usercp/messages')->with('success', 'Mesajınız gönderildi!');

    }

    public function readMsg(Conversation $conversation)
    {
        return view('login.messages.read' , compact('conversation'));
    }

    public function replyMsg(Conversation $conversation,Request $request)
    {

        $attributes = request()->validate([
            'body' => 'required'
        ]);

        $conversation->messages()->create([
            'user_id' => $request->user()->id,
            'body' =>  $attributes['body']
        ]);

        return back()->with('success', 'Mesajınız gönderildi');

    }

}
