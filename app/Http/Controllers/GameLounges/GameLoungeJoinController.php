<?php

namespace App\Http\Controllers\GameLounges;

use App\Http\Controllers\Controller;
use App\Models\ChatRoom;
use App\Models\ChatRoomUser;
use App\Models\GameLounge;
use App\Models\User;
use App\Models\WodoAssetAccount;
use DB;
use Redirect;

class GameLoungeJoinController extends Controller
{
    public function __invoke(string $gameLounge)
    {
        $user = request()->user();
        //TODO: Redirect if user already joined

        DB::transaction(function () use ($user, $gameLounge) {
            // sharedLock: prevents the selected rows from being modified until your transaction is committed (read)
            // lockForUpdate: prevents the selected records from being modified or from being selected with another shared lock (read or update)

            // Todo: user should not be joined to any other active lounges
            $gameLounge = GameLounge::query()
                ->lockForUpdate()
                ->find($gameLounge);

            if (!$gameLounge->has_available_spots) {
                session()->flash(
                    'error',
                    'Sorry, there is no available spot, please try again later.',
                );
                return;
            }

            /** @var \App\Models\UserAssetAccount $assetAccount */
            $assetAccount = $user
                ->assetAccounts()
                ->where('asset_id', $gameLounge->asset_id)
                ->lockForUpdate()
                ->first();

            if ($assetAccount->balance < $gameLounge->base_entrance_fee) {
                session()->flash(
                    'error',
                    'Insufficient amount to do the transaction.',
                );
                return;
            }

            $assetAccount->update([
                'balance' =>
                    $assetAccount->balance -
                    ($fee = $gameLounge->base_entrance_fee),
            ]);
            $wodoAccount = WodoAssetAccount::sharedLock()
                ->where('asset_id', $gameLounge->asset_id)
                ->first();
            $wodoAccount->update([
                'balance' => $wodoAccount->balance + $fee,
            ]);

            $gameLounge->decrement('available_spots');

            $gameLounge->users()->syncWithPivotValues(
                ids: $user->id,
                values: [
                    'entrance_fee' => $fee,
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
            'gameLounge' => $gameLounge,
        ]);
    }
}
