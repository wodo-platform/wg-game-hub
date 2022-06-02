<?php

namespace App\Http\Controllers\GameLounges;

use App\Http\Controllers\Controller;
use App\Models\GameLounge;
use Inertia\Inertia;

class GameLoungesController extends Controller
{
    public function show(GameLounge $gameLounge)
    {
        $gameLounge->load(
            'game:id,name,slug,description',
            'users:id,name,image,username',
        );
        return Inertia::render('Games/Lounges/Show', [
            'lounge' => $gameLounge,
        ]);
    }
}
