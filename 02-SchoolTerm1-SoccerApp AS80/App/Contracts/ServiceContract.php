<?php

namespace App\Contracts;

use App\Application;

interface ServiceContract{

    public function __construct(Application $app);
}