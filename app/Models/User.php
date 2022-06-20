<?php

namespace App\Models;

use App\Models\Concerns\HasUUID;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasUUID;

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'username',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['full_name'];

    public function gameLounges(): BelongsToMany
    {
        return $this->belongsToMany(GameLounge::class);
    }

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->name . ' ' . $this->last_name;
            },
        );
    }

    public function chatRooms(): BelongsToMany
    {
        return $this->belongsToMany(ChatRoom::class)->using(
            ChatRoomUser::class,
        );
    }

    public function assets(): BelongsToMany
    {
        return $this->belongsToMany(Asset::class, 'user_asset_account')->using(
            UserAssetAccount::class,
        );
    }

    public function assetAccounts(): HasMany
    {
        return $this->hasMany(UserAssetAccount::class);
    }
}
