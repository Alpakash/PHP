<?php

namespace App\Services;

class SessionService extends Service{

    public function boot()
    {
        $session = new Session;

        $this->app->instance('session', $session, true);
    }
}