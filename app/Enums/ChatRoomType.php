<?php

namespace App\Enums;

enum ChatRoomType: int
{
    case OneToOne = 1;
    case GameLobby = 2;
}
