<?php

namespace App\Actions\Games\GameLobbies;

use App\Models\ChatRoomUser;
use App\Models\GameLobby;
use App\Models\WodoAssetAccount;
use DB;
use Illuminate\Http\Request;

class AddUserToGameLobbyAction
{
    public function execute(Request $request, string $gameLobbyID): GameLobby
    {
        $user = $request->user();
        //TODO: Redirect if user already joined

        DB::transaction(function () use ($user, $gameLobbyID) {
            // sharedLock: prevents the selected rows from being modified until your transaction is committed (read)
            // lockForUpdate: prevents the selected records from being modified or from being selected with another shared lock (read or update)

            $gameLobby = GameLobby::query()
                ->lockForUpdate()
                ->findOrFail($gameLobbyID);

            if (!$gameLobby->has_available_spots) {
                session()->flash(
                    'error',
                    'Sorry, there is no available spot, please try again later.',
                );
                return;
            }

            /** @var \App\Models\UserAssetAccount $assetAccount */
            $assetAccount = $user
                ->assetAccounts()
                ->where('asset_id', $gameLobby->asset_id)
                ->lockForUpdate()
                ->first();

            if ($assetAccount->balance < $gameLobby->base_entrance_fee) {
                session()->flash(
                    'error',
                    'Insufficient amount to do the transaction.',
                );
                return;
            }

            $assetAccount->update([
                'balance' =>
                    $assetAccount->balance -
                    ($fee = $gameLobby->base_entrance_fee),
            ]);
            $wodoAccount = WodoAssetAccount::sharedLock()
                ->where('asset_id', $gameLobby->asset_id)
                ->first();
            $wodoAccount->update([
                'balance' => $wodoAccount->balance + $fee,
            ]);

            $gameLobby->decrement('available_spots');

            $gameLobby->users()->syncWithPivotValues(
                ids: $user->id,
                values: [
                    'entrance_fee' => $fee,
                    'joined_at' => now(),
                ],
                detaching: false,
            );

            ChatRoomUser::firstOrCreate([
                'chat_room_id' => $gameLobby->id,
                'user_id' => $user->id,
            ]);

            return $gameLobby;
        });
    }
}
