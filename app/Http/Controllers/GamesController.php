<?php

namespace App\Http\Controllers;

use App\Http\QueryPipelines\GameLobbyPipeline\GameLobbyPipeline;
use App\Models\Game;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GamesController extends Controller
{
    public function show(Request $request, Game $game)
    {
        return Inertia::render('Games/Show', [
            'game' => $game->only(['name', 'description', 'image']),
            'game_options' => GameLobbyPipeline::make(
                builder: $game->gameLobbies()->getQuery(),
                request: $request,
            )
                ->with('asset:id,name,symbol')
                ->paginate(),
        ]);
    }
}
