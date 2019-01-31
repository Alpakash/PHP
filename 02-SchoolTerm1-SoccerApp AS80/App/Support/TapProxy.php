<?php
/**
 * Created by PhpStorm.
 * User: DesleyRoelofsen
 * Date: 18-09-18
 * Time: 22:49
 */

namespace App\Support;


class TapProxy
{

    protected $target;

    public function __construct($target)
    {
        $this->target = $target;
    }

    public function __call($method, $parameters)
    {
        $this->target->{$method}(...$parameters);
        return $this->target;
    }
}