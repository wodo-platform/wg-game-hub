<?php

namespace App\Http\Controllers\API\Games;

use App\Http\Controllers\Controller;
use App\Http\Resources\GameLobbyResource;
use App\Models\GameLobby;
use Inertia\Inertia;

class GameLobbiesController extends Controller
{
    public function show(GameLobby $gameLobby)
    {
        $gameLobby->load(
            'game:id,name,description',
            'users:id,name,image,username',
        );

        return new GameLobbyResource(resource: $gameLobby);
    }
}
