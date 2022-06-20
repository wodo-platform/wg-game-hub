<?php

namespace App\Models;

use App\Enums\UserAssetAccountStatus;
use App\Models\Concerns\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAssetAccount extends Pivot
{
    use HasUUID;
    use SoftDeletes;
    use HasFactory;

    protected $casts = [
        'status' => UserAssetAccountStatus::class,
    ];
}
