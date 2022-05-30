<?php

namespace App\Builders;

use App\Enums\GameStatus;
use Illuminate\Database\Eloquent\Builder;

class GameBuilder extends Builder
{
    public function online(): Builder
    {
        return $this->where('status', GameStatus::Online->value);
    }

    public function forDashboard(): Builder
    {
        return $this->select(['id', 'name', 'slug', 'description', 'image']);
    }
}
