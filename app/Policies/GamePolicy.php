<?php

namespace App\Policies;

use App\Models\Game;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GamePolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, Game $game): bool
    {
        //
    }

    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, Game $game): bool
    {
        //
    }

    public function delete(User $user, Game $game): bool
    {
        //
    }

    public function restore(User $user, Game $game): bool
    {
        //
    }

    public function forceDelete(User $user, Game $game): bool
    {
        //
    }
}
