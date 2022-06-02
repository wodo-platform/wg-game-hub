<?php

namespace App\Http\Controllers\GameLounges;

use App\Http\Controllers\Controller;
use App\Models\GameLounge;
use App\Models\User;
use Redirect;

class GameLoungeJoinController extends Controller
{
    public function __invoke(GameLounge $gameLounge)
    {
        //TODO: "event sourcing" here, keeping it like this to let the user join the lounge and start the chat. (lock for update)
        $user = request()->user();
        $gameLounge->users()->syncWithPivotValues(
            ids: $user->id,
            values: [
                'entrance_fee' => 1,
                'joined_at' => now(),
            ],
            detaching: false,
        );

        return Redirect::route('game-lounges.show', [
            'gameLounge' => $gameLounge->id,
        ]);
    }
}
