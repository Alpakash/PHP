<?php

namespace App\Services\Request;

use App\Services\Service;
use App\Services\Request\Request as RequestClass;

class RequestService extends Service{

    public function boot()
    {
        $request = new RequestClass();

        $this->app->instance('request', $request, "App\\Services\\Request\\RequestService");
    }
}