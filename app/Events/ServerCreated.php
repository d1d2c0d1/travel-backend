<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ServerCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $afterCommit = true;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function broadcastOn(): Channel|PrivateChannel|array
    {
        return new PrivateChannel('user.' . $this->user->id);
    }

    public function broadcastWith()
    {
        return ['id' => $this->user->id];
    }

    public function broadcastQueue()
    {
        return 'default';
    }

    public function broadcastAs()
    {
        return 'server.created';
    }
}
