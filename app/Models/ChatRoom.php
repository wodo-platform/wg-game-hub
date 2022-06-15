<?php

namespace App\Models;

use App\Models\Concerns\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChatRoom extends Model
{
    use HasUUID;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->using(ChatRoomUser::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(ChatRoomMessage::class);
    }
}
