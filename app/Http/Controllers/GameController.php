<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GameController extends Controller
{
    public function show_game()
    {
        $game_options_info = [
            [
                'id' => '1',
                'image' => asset('images/game-art.png'),
                'price' => 'for free',
                'rules' => [
                    'Bag on the board (in-the-count, boarder, or woody',
                ],
            ],
            [
                'id' => '2',
                'image' => asset('images/game-art.png'),
                'price' => 'for free',
                'rules' => [
                    'Bag on the board (in-the-count, boarder, or woody',
                ],
            ],
            [
                'id' => '1',
                'image' => asset('images/game-art.png'),
                'price' => 'for free',
                'rules' => [
                    'Bag on the board (in-the-count, boarder, or woody',
                ],
            ],
            [
                'id' => '2',
                'image' => asset('images/game-art.png'),
                'price' => 'for free',
                'rules' => [
                    'Bag on the board (in-the-count, boarder, or woody',
                ],
            ],
            [
                'id' => '1',
                'image' => asset('images/game-art.png'),
                'price' => 'for free',
                'rules' => [
                    'Bag on the board (in-the-count, boarder, or woody',
                ],
            ],
            [
                'id' => '2',
                'image' => asset('images/game-art.png'),
                'price' => 'for free',
                'rules' => [
                    'Bag on the board (in-the-count, boarder, or woody',
                ],
            ],
            [
                'id' => '1',
                'image' => asset('images/game-art.png'),
                'price' => 'for free',
                'rules' => [
                    'Bag on the board (in-the-count, boarder, or woody',
                ],
            ],
            [
                'id' => '2',
                'image' => asset('images/game-art.png'),
                'price' => 'for free',
                'rules' => [
                    'Bag on the board (in-the-count, boarder, or woody',
                ],
            ],
        ];

        $game_info = [
            'name' => 'Snake.io',
            'small_description' => 'A small description about the game',
            'online_players' => 1.392,
            'count_game_options' => count($game_options_info),
        ];
        $game_info = (object) $game_info;

        return Inertia::render('GameOptions', [
            'game_info' => $game_info,
            'game_options_info' => $game_options_info,
        ]);
    }
}
