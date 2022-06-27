<?php

namespace App\Http\Controllers\ChatRooms;

use App\Actions\Chat\SendChatMessageToRoomAction;
use App\Events\ChatRoom\ChatRoomMessageEvent;
use App\Models\ChatRoom;
use App\Models\ChatRoomMessage;
use Illuminate\Http\Request;
use Redirect;

class ChatRoomMessageController
{
    public function __invoke(
        Request $request,
        ChatRoom $chatRoom,
        SendChatMessageToRoomAction $sendChatMessageToRoom,
    ) {
        $sendChatMessageToRoom->execute(request: $request, chatRoom: $chatRoom);
        return Redirect::back();
    }
}
