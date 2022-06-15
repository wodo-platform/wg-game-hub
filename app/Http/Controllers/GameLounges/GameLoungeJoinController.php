<?php

namespace App\Http\Controllers\GameLounges;

use App\Http\Controllers\Controller;
use App\Models\ChatRoom;
use App\Models\ChatRoomUser;
use App\Models\GameLounge;
use App\Models\User;
use DB;
use Redirect;

class GameLoungeJoinController extends Controller
{
    public function __invoke(GameLounge $gameLounge)
    {
        $user = request()->user();
        DB::transaction(function () use ($user, $gameLounge) {
            //TODO: Lock the records and cut the fee (Action)
            // Add the user to the lounge
            $gameLounge->users()->syncWithPivotValues(
                ids: $user->id,
                values: [
                    'entrance_fee' => 1,
                    'joined_at' => now(),
                ],
                detaching: false,
            );
            ChatRoomUser::firstOrCreate([
                'chat_room_id' => $gameLounge->id,
                'user_id' => $user->id,
            ]);
        });

        return Redirect::route('game-lounges.show', [
            'gameLounge' => $gameLounge->id,
        ]);
    }
}
