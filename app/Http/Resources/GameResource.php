<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Game */
class GameResource extends JsonResource
{
    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'image' => $this->image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'game_lobbies' => GameLobbyResource::collection(
                $this->whenLoaded('gameLobbies'),
            ),
            'game_lobbies_count' => $this->whenNotNull(
                $this->game_lobbies_count,
            ),
        ];
    }
}
