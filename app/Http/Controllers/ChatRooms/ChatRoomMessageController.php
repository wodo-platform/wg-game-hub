<?php

namespace App\Http\Controllers\ChatRooms;

use App\Actions\Chat\SendChatMessageToRoomAction;
use App\Http\Controllers\Controller;
use App\Models\ChatRoom;
use Illuminate\Http\Request;
use Redirect;

class ChatRoomMessageController extends Controller
{
    public function __invoke(
        Request $request,
        ChatRoom $chatRoom,
        SendChatMessageToRoomAction $sendChatMessageToRoom,
    ) {
        $this->authorize('message', $chatRoom);

        $request->validate([
            'message' => 'required',
        ]);
        $sendChatMessageToRoom->execute(request: $request, chatRoom: $chatRoom);
        return Redirect::back();
    }
}
