<?php

namespace App\Models;

use App\Builders\GameLoungeBuilder;
use App\Enums\GameLoungeStatus;
use App\Enums\GameLoungeType;
use App\Models\Concerns\HasUUID;
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

    public function newEloquentBuilder($query): GameLoungeBuilder
    {
        return new GameLoungeBuilder(query: $query);
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
}
