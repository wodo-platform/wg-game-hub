<?php

namespace App\Models;

use App\Builders\GameBuilder;
use App\Enums\GameStatus;
use App\Models\Concerns\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUUID;

    protected $casts = [
        'status' => GameStatus::class,
    ];

    public function newEloquentBuilder($query): GameBuilder
    {
        return new GameBuilder(query: $query);
    }

    public function gameLounges(): HasMany
    {
        return $this->hasMany(GameLounge::class);
    }
}
