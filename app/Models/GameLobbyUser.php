<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class GameLobbyUser extends Pivot
{
    use HasFactory;

    public $incrementing = true;
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function gameLobby(): BelongsTo
    {
        return $this->belongsTo(GameLobby::class);
    }
}
