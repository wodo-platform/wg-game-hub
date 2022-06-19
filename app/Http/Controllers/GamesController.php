<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Inertia\Inertia;

class GamesController extends Controller
{
    public function show(Game $game)
    {
        return Inertia::render('Games/Show', [
            'game' => $game->only(['name', 'description', 'image']),
            'gameOptions' => $game
                ->gameLounges()
                ->with('asset:id,name,symbol')
                ->paginate(),
        ]);
    }
}
