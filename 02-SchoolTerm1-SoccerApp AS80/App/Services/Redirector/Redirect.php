<?php

namespace App\Services\Redirector;

use Symfony\Component\HttpFoundation\RedirectResponse;

class Redirect{

    public function to($url)
    {
        $response = new RedirectResponse($url);
        $response->send();
    }

    public function back()
    {
        
    }
}