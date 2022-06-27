<?php

namespace App\Actions\Games\GameLobbies;

use App\Models\ChatRoomUser;
use App\Models\GameLobby;
use App\Models\WodoAssetAccount;
use DB;
use Illuminate\Http\Request;

class RemoveUserFromGameLobbyAction
{
    public function execute(Request $request, string $gameLobbyID): GameLobby
    {
        $user = $request->user();
        DB::transaction(function () use ($user, $gameLobbyID) {
            // sharedLock: prevents the selected rows from being modified until your transaction is committed (read)
            // lockForUpdate: prevents the selected records from being modified or from being selected with another shared lock (read or update)

            $gameLobby = GameLobby::query()
                ->lockForUpdate()
                ->findOrFail($gameLobbyID);

            /** @var \App\Models\UserAssetAccount $assetAccount */
            $assetAccount = $user
                ->assetAccounts()
                ->where('asset_id', $gameLobby->asset_id)
                ->lockForUpdate()
                ->first();

            $assetAccount->update([
                'balance' =>
                    $assetAccount->balance +
                    ($fee = $gameLobby->base_entrance_fee),
            ]);
            $wodoAccount = WodoAssetAccount::sharedLock()
                ->where('asset_id', $gameLobby->asset_id)
                ->first();
            $wodoAccount->update([
                'balance' => $wodoAccount->balance - $fee,
            ]);

            $gameLobby->increment('available_spots');

            $gameLobby->users()->detach([$user->id]);

            ChatRoomUser::where([
                ['chat_room_id', '=', $gameLobby->id],
                ['user_id', '=', $user->id],
            ])->delete();

            return $gameLobby;
        });
    }
}
