<?php

namespace App\Policies;

use App\Models\GameLobby;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GameLobbyPolicy
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

    public function view(User $user, GameLobby $gameLobby): bool
    {
        return $gameLobby
            ->users()
            ->where('users.id', $user->id)
            ->exists();
    }

    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, GameLobby $gameLobby): bool
    {
        //
    }

    public function delete(User $user, GameLobby $gameLobby): bool
    {
        //
    }

    public function restore(User $user, GameLobby $gameLobby): bool
    {
        //
    }

    public function forceDelete(User $user, GameLobby $gameLobby): bool
    {
        //
    }

    public function join(User $user, GameLobby $gameLobby): bool
    {
        return $gameLobby
            ->users()
            ->where('users.id', $user->id)
            ->doesntExist();
    }

    public function leave(User $user, GameLobby $gameLobby): bool
    {
        return $gameLobby
            ->users()
            ->where('users.id', $user->id)
            ->exists();
    }
}
