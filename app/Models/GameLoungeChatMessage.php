<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameLoungeChatMessage extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'message', 'created_at'];
    public function gameLounge(): BelongsTo
    {
        return $this->belongsTo(GameLounge::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
