<?php

namespace App\Models;

use App\Builders\GameLoungeBuilder;
use App\Enums\GameLoungeStatus;
use App\Enums\GameLoungeType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameLounge extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $casts = [
        'type' => GameLoungeType::class,
        'state' => GameLoungeStatus::class,
    ];

    public function newEloquentBuilder($query): GameLoungeBuilder
    {
        return new GameLoungeBuilder(query: $query);
    }

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }
}
