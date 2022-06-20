<?php

namespace App\Models;

use App\Builders\GameLoungeBuilder;
use App\Enums\GameLoungeStatus;
use App\Enums\GameLoungeType;
use App\Models\Concerns\HasUUID;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameLounge extends Model
{
    use SoftDeletes;
    use HasFactory;
    use HasUUID;

    protected $casts = [
        'type' => GameLoungeType::class,
        'state' => GameLoungeStatus::class,
    ];

    protected $appends = ['has_available_spots', 'players_in_lounge_count'];
    public function newEloquentBuilder($query): GameLoungeBuilder
    {
        return new GameLoungeBuilder(query: $query);
    }

    public function hasAvailableSpots(): Attribute
    {
        return new Attribute(
            get: function () {
                return $this->available_spots > 0 &&
                    $this->available_spots <= $this->max_players;
            },
        );
    }

    public function playersInLoungeCount(): Attribute
    {
        return new Attribute(
            get: function () {
                return abs($this->available_spots - $this->max_players);
            },
        );
    }
    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function chatMessages(): HasMany
    {
        return $this->hasMany(GameLoungeChatMessage::class);
    }

    public function chatRoom(): HasOne
    {
        return $this->hasOne(ChatRoom::class, 'id');
    }

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class);
    }
}
