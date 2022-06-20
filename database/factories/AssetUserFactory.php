<?php

namespace Database\Factories;

use App\Enums\UserAssetAccountStatus;
use App\Models\Asset;
use App\Models\UserAssetAccount;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AssetUserFactory extends Factory
{
    protected $model = UserAssetAccount::class;

    public function definition(): array
    {
        return [
            'balance' => $this->faker->randomFloat(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    public function active(): static
    {
        return $this->state(function () {
            return ['status' => UserAssetAccountStatus::Active];
        });
    }
}
