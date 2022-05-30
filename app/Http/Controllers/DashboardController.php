<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $games = Game::online()
            ->forDashboard()
            ->withCount('gameLounges')
            ->paginate();
        $balance = [
            [
                'id' => 1,
                'name' => 'BANANO',
                'image' => '',
                'balance' => 3275,
                'address' => '1PQi1jwKr4cnfFYKgeHAAAdf1PQi1jwKr4cnfFYKgeHAAAd',
            ],
            [
                'id' => 2,
                'name' => 'BTC',
                'image' => '',
                'balance' => 3,
                'address' => 'cnfFYKgeHAAAdf1PQi1jwK1PQi1jwKr4r4cnfFYKgeHAAAd',
            ],
            [
                'id' => 3,
                'name' => 'NANO',
                'image' => '',
                'balance' => 30000,
                'address' => 'wKr4cnfFYKgeHAAAd1PQi1jwKr4cnfFYKgeHAAAdf1PQi1j',
            ],
        ];

        return Inertia::render('Dashboard', [
            'dashboard_art' => asset('images/dashboard-art.png'),
            'games' => $games,
            'balance' => $balance,
        ]);
    }
}
