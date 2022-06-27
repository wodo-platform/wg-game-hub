<?php

namespace App\Http\Controllers\API\Games;

use App\Http\Controllers\Controller;
use App\Http\Resources\GameResource;
use App\Models\Game;

class GamesController extends Controller
{
    public function index()
    {
        // Build pipeline and according to media query build the database query
        $games = Game::online()
            ->withCount('gameLobbies')
            ->paginate();

        return GameResource::collection($games);
    }

    public function show(Game $game)
    {
        $game->load('gameLobbies');
        return new GameResource($game);
    }
}
