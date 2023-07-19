<?php

namespace App\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserDataUpdated implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $users;

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('user-data');
    }

    public function broadcastAs()
    {
        return 'user.updated';
    }
}
