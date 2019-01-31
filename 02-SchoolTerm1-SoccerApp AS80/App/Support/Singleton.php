<?php

namespace App\Support;

/**
 * This is a trait that will be used by the classes that will use the singleton pattern design.
 */
trait Singleton{

    /**
     * In the static property $instance will we define the objects that use the singleton pattern design.
     *
     * @var object
     */
    protected static $instance;

    /**
     * We check if the static property $instance already exists, if it already exists than we will return it.
     * If it not exists than we will create it.
     *
     * @return self
     */
    public static function create()
    {
        if(!self::$instance){
            self::setInstance();
        }

        return self::$instance;
    }

    /**
     * Create the instance that will be used for the singleton pattern design.
     *
     * @return void
     */
    public static function setInstance()
    {
        self::$instance = new self;
    }
}