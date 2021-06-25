<?php

namespace App\Listeners;

use App\Models\Empresa;
use App\Models\User;
use App\Models\UserExtra;
use DateTime;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user = UserExtra::where('user_id', $event->user->id)->count();

        if ($event->user->role == 1) {
            if ($user == 0) {
                $c = new UserExtra();
                $c->user_id = $event->user->id;
                $c->save();
            }
        }

        if ($event->user->role == 2) {
            if ($user == 0) {
                $c = new Empresa();
                $c->user_id = $event->user->id;
                $c->save();
            }
        }
    }
}
