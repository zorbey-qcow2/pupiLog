<?php

namespace App\Listeners;

use App\Events\ConversionEvent;
use App\Models\User;
use App\Notifications\ConversationCreatedNotification;
use Illuminate\Support\Facades\Notification;

class ConversionListen
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

//Controller:
//
//event(new ConversionEvent($conversation, $sender, $receiver));
//
//
//Event:
//
//    // If you can get the sender and receiver from the conversation and know which is which,
//    //		then don't send the two users and just get them from the conversation.
//    public function __construct(public Conversation $conversation, public User $sender, public User $receiver)
//    {}
//
//
//Listener:
//
//    public function handle(ConversionEvent $event)
//    {
//        Notification::send($event->receiver, new ConversationCreatedNotification($event->sender));
//    }

    /**
     * Handle the event.
     *
     * @param \App\Events\ConversionEvent $event
     * @return void
     */
    public function handle(ConversionEvent $event)
    {
        $receiverUserId = $event->receiverUserId;
        $senderUserId = $event->senderUserId;

        $senderUser = User::find($senderUserId);
        $receiverUser = User::find($receiverUserId);

//        Log::info('Alıcı:' .  $receiverUserId . ' Gönderen:' . $senderUserId );
        Notification::send($receiverUser, new ConversationCreatedNotification($senderUser));
    }
}
