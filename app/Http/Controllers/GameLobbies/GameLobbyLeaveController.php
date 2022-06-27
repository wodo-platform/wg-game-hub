<?php

namespace App\Http\Controllers\GameLobbies;

use App\Actions\Games\GameLobbies\RemoveUserFromGameLobbyAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameLobbyLeaveController extends Controller
{
    public function __invoke(
        Request $request,
        string $gameLobby,
        RemoveUserFromGameLobbyAction $removeUserFromGameLobbyAction,
    ) {
        $gameLobby = $removeUserFromGameLobbyAction->execute(
            request: $request,
            gameLobbyID: $gameLobby,
        );

        return redirect()->route('games.show', ['id' => $gameLobby->id]);
    }
}
