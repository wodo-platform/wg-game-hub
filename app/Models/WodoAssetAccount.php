<?php

namespace App\Models;

use App\Models\Concerns\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class WodoAssetAccount extends Model
{
    use HasUUID;
    use SoftDeletes;

    protected $guarded = [];

    public function asset(): BelongsTo
    {
        return $this->belongsTo(related: Asset::class);
    }
}
