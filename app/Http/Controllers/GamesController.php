<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class GamesController extends Controller
{
    public function __invoke()
    {
        $gameOptions = [
            [
                'id' => 1,
                'title' => 'restricted rules',
                'image' => asset('images/game-option-art.png'),
                'price' => 'for free',
                'rules' => [
                    'Bag on the board (in-the-count, boarder, or woody',
                    'Bag on the board (in-the-count, boarder, or woody',
                    'Bag on the board (in-the-count, boarder, or woody',
                ],
            ],
            [
                'id' => 2,
                'title' => 'forever game',
                'image' => asset('images/game-option-art.png'),
                'price' => 'for free',
                'rules' => [
                    'Bag on the board (in-the-count, boarder, or woody',
                    'Bag on the board (in-the-count, boarder, or woody',
                    'Bag on the board (in-the-count, boarder, or woody',
                ],
            ],
            [
                'id' => 3,
                'title' => 'forever game',
                'image' => asset('images/game-option-art.png'),
                'price' => 'for free',
                'rules' => [
                    'Bag on the board (in-the-count, boarder, or woody',
                    'Bag on the board (in-the-count, boarder, or woody',
                    'Bag on the board (in-the-count, boarder, or woody',
                ],
            ],
            [
                'id' => 4,
                'title' => 'forever game',
                'image' => asset('images/game-option-art.png'),
                'price' => 'for free',
                'rules' => [
                    'Bag on the board (in-the-count, boarder, or woody',
                    'Bag on the board (in-the-count, boarder, or woody',
                    'Bag on the board (in-the-count, boarder, or woody',
                ],
            ],
            [
                'id' => 5,
                'title' => 'forever game',
                'image' => asset('images/game-option-art.png'),
                'price' => 'for free',
                'rules' => [
                    'Bag on the board (in-the-count, boarder, or woody',
                    'Bag on the board (in-the-count, boarder, or woody',
                    'Bag on the board (in-the-count, boarder, or woody',
                ],
            ],
            [
                'id' => 6,
                'title' => 'forever game',
                'image' => asset('images/game-option-art.png'),
                'price' => 'for free',
                'rules' => [
                    'Bag on the board (in-the-count, boarder, or woody',
                    'Bag on the board (in-the-count, boarder, or woody',
                    'Bag on the board (in-the-count, boarder, or woody',
                ],
            ],
            [
                'id' => 7,
                'title' => 'forever game',
                'image' => asset('images/game-option-art.png'),
                'price' => 'for free',
                'rules' => [
                    'Bag on the board (in-the-count, boarder, or woody',
                    'Bag on the board (in-the-count, boarder, or woody',
                    'Bag on the board (in-the-count, boarder, or woody',
                ],
            ],
            [
                'id' => 8,
                'title' => 'forever game',
                'image' => asset('images/game-option-art.png'),
                'price' => 'for free',
                'rules' => [
                    'Bag on the board (in-the-count, boarder, or woody',
                    'Bag on the board (in-the-count, boarder, or woody',
                    'Bag on the board (in-the-count, boarder, or woody',
                ],
            ],
        ];
        $game = [
            'name' => 'Snake.io',
            'description' => 'A small description about the game',
            'total_online_players' => 1392,
            'game_options_count' => count($gameOptions),
            'options' => $gameOptions,
        ];

        return Inertia::render('Games/Show', [
            'game' => $game,
        ]);
    }
}
