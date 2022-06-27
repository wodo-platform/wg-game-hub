<?php

namespace App\Http\Controllers\API\ChatRooms;

use App\Actions\Chat\SendChatMessageToRoomAction;
use App\Http\Controllers\Controller;
use App\Models\ChatRoom;
use Illuminate\Http\Request;

class ChatRoomMessageController extends Controller
{
    public function __invoke(
        Request $request,
        ChatRoom $chatRoom,
        SendChatMessageToRoomAction $sendChatMessageToRoomAction,
    ) {
        $sendChatMessageToRoomAction->execute(
            request: $request,
            chatRoom: $chatRoom,
        );

        return response()->noContent();
    }
}
