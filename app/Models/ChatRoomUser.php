<?php

namespace App\Models;

use App\Models\Concerns\HasUUID;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ChatRoomUser extends Pivot
{
    public $incrementing = true;
    protected $guarded = [];
}
