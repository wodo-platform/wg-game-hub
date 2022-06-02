<?php

namespace App\Http\Controllers\GameLounges;

use App\Events\GameLoungeChatMessageEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\GameLoungeChatMessageRequest;
use App\Models\GameLounge;
use App\Models\GameLoungeChatMessage;
use Redirect;

class GameLoungeChatMessageController extends Controller
{
    public function __invoke(
        GameLoungeChatMessageRequest $request,
        GameLounge $gameLounge,
    ) {
        $user = $request->user();
        $gameLounge->chatMessages()->save(
            $message = new GameLoungeChatMessage([
                'user_id' => $user->id,
                'message' => $request->message,
                'created_at' => now(),
            ]),
        );
        broadcast(
            new GameLoungeChatMessageEvent(
                gameLounge: $gameLounge,
                sender: $user,
                gameLoungeChatMessage: $message,
            ),
        );

        return Redirect::back();
    }
}
