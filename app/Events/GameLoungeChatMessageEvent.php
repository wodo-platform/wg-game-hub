<?php

namespace App\Events;

use App\Models\GameLounge;
use App\Models\GameLoungeChatMessage;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GameLoungeChatMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public GameLounge $gameLounge;
    public User $sender;
    public GameLoungeChatMessage $gameLoungeChatMessage;

    public function __construct(
        GameLounge $gameLounge,
        User $sender,
        GameLoungeChatMessage $gameLoungeChatMessage,
    ) {
        $this->gameLounge = $gameLounge;
        $this->sender = $sender;
        $this->gameLoungeChatMessage = $gameLoungeChatMessage;
    }

    public function broadcastOn(): Channel
    {
        return new PresenceChannel('game-lounge.' . $this->gameLounge->id);
    }

    public function broadcastAs(): string
    {
        return 'chat.message';
    }

    public function broadcastWith(): array
    {
        return [
            'sender' => [
                'id' => $this->sender->id,
                'name' => $this->sender->name,
                'last_name' => $this->sender->last_name,
                'full_name' => $this->sender->full_name,
                'username' => $this->sender->username,
                'image' => $this->sender->image,
            ],
            'game_lounge' => [
                'id' => $this->gameLounge->id,
            ],
            'message' => [
                'message' => $this->gameLoungeChatMessage->message,
                'created_at_human_readable' => $this->gameLoungeChatMessage->created_at->toDateTimeString(),
            ],
        ];
    }
}
