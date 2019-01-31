<?php

namespace App\Services\Redirector;

use App\Services\Service;

class RedirectService extends Service{

    public function boot()
    {
        $redirect = new Redirect;

        $this->app->instance('redirect', $redirect, "App\\Services\\Service\\RedirectService");
    }
}