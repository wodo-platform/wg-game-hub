<?php

namespace App\Http\Controllers\GameLobbies;

use App\Http\Controllers\Controller;
use App\Models\GameLobby;
use Inertia\Inertia;

class GameLobbiesController extends Controller
{
    public function show(GameLobby $gameLobby)
    {
        $this->authorize('view', $gameLobby);

        $gameLobby->load(
            'game:id,name,description',
            'users:id,name,image,username',
        );

        return Inertia::render('Games/Lobbies/Show', [
            'lobby' => $gameLobby,
        ]);
    }
}
