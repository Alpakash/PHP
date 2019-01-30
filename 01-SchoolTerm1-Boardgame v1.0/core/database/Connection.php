<?php

/**
 * Created by: Veggiecoder - Akash 2018
 * phpoop
 */

class Connection
{
    public static function make($config)
    {
        /**
         * PDO() to your database setup in config file
         */
        try {
            return new PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}

