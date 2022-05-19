<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $fakeData = [
            [
                'id' => 1,
                'game_art' => asset('images/game-art.png'),
                'name' => 'Snake.io',
                'description' =>
                    'Anim eu ea voluptate deserunt eiusmod esse ea proident consequat ea ut ut ad magna.',
                'url' => '',
                'meta' => [
                    'game_options_count' => 8,
                    'total_online_players' => 1392,
                ],
            ],
            [
                'id' => 2,
                'game_art' => asset('images/game-art.png'),
                'name' => 'agar.io',
                'description' =>
                    'Reprehenderit esse velit irure magna tempor duis dolor.',
                'url' => '',
                'meta' => [
                    'game_options_count' => 6,
                    'total_online_players' => 1921,
                ],
            ],
        ];
        $balance = [
            [
                'name' => 'BANANO',
                'image' => '',
                'balance' => 3275,
                'address' => '1PQi1jwKr4cnfFYKgeHAAAdf1PQi1jwKr4cnfFYKgeHAAAd',
            ],
            [
                'name' => 'BTC',
                'image' => '',
                'balance' => 3,
                'address' => 'cnfFYKgeHAAAdf1PQi1jwK1PQi1jwKr4r4cnfFYKgeHAAAd',
            ],
            [
                'name' => 'NANO',
                'image' => '',
                'balance' => 30000,
                'address' => 'wKr4cnfFYKgeHAAAd1PQi1jwKr4cnfFYKgeHAAAdf1PQi1j',
            ],
        ];
        return Inertia::render('Dashboard', [
            'dashboard_art' => asset('images/dashboard-art.png'),
            'games' => $fakeData,
            'balance' => $balance,
        ]);
    }
}
