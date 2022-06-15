<?php

namespace App\Http\Controllers\ChatRoom;

use App\Events\ChatRoom\ChatRoomMessageEvent;
use App\Models\ChatRoom;
use App\Models\ChatRoomMessage;
use Illuminate\Http\Request;
use Redirect;

class ChatRoomMessageController
{
    public function __invoke(Request $request, ChatRoom $chatRoom)
    {
        $user = $request->user();
        $chatRoom->messages()->save(
            $message = new ChatRoomMessage([
                'user_id' => $user->id,
                'message' => $request->message,
                'created_at' => now(),
            ]),
        );

        broadcast(
            new ChatRoomMessageEvent(
                chatRoom: $chatRoom,
                sender: $user,
                chatRoomMessage: $message,
            ),
        );
        return Redirect::back();
    }
}
