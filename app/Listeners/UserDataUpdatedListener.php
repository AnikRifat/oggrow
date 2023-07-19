<?php

namespace App\Listeners;

use App\Events\UserDataUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserDataUpdatedListener implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(UserDataUpdated $event)
    {
        broadcast(new UserDataUpdated($event->users))->toOthers();
    }
}
