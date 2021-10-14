<?php

namespace App\Listeners;

use App\Events\NewUserRegisteredEvent;
use App\Notifications\Auth\WelcomeMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeMailListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(NewUserRegisteredEvent $event)
    {
        $event->user->notify( (new WelcomeMail($event->user) ) );
    }
}
