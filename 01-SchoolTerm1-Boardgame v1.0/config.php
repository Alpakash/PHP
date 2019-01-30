<?php

/**
 * Created by: Veggiecoder - Akash 2018
 * phpoop
 */
/**
 * @database - configuration for PDO()
 */
define('DB_HOST', 'localhost');
define('DB_NAME', 'boardgame');
define('DB_PORT', '3306');
define('DB_USER', 'root');
define('DB_PASS', '');


return [
    'database' => [
        'name' => 'boardgame',
        'username' => 'root',
        'password' => '',
        'connection' => 'mysql:host=localhost:3306',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ]
    ]
];




?>