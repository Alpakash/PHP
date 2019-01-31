<?php

namespace App\Services;

use App\Application;
use App\Contracts\ServiceContract;

class Service implements ServiceContract{

    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }
}