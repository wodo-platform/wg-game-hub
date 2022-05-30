<?php

namespace Database\Factories;

use App\Enums\GameLoungeStatus;
use App\Enums\GameLoungeType;
use App\Models\Game;
use App\Models\GameLounge;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class GameLoungeFactory extends Factory
{
    protected $model = GameLounge::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'image' => $this->faker->imageUrl(337, 110),
            'theme_color' => $this->faker->safeHexColor(),
            'type' => $this->faker->randomElement(GameLoungeType::cases()),
            'status' => $this->faker->randomElement(GameLoungeStatus::cases()),
            'rules' => $this->faker->paragraph(),
            'base_entrance_fee' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'game_id' => Game::factory(),
        ];
    }
}
