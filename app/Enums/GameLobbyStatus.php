<?php

namespace App\Enums;

enum GameLobbyStatus: int
{
    case Scheduled = 1;
    case Lobby = 2;
    case InGame = 3;
    case LeaderBoard = 4;
    case Ended = 5;
}
