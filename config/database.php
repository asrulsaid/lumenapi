<?php

return [

   'default' => 'mysql',
   'migrations' => 'migrations',
   'connections' => [
        'mysql' => [
            'driver'    => 'mysql',
            'host'      => env('DB_HOST'),
            'port'      => env('DB_PORT'),
            'database'  => env('DB_DATABASE'),
            'username'  => env('DB_USERNAME'),
            'password'  => env('DB_PASSWORD'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'strict'    => false,
            'timezone'  => env('DB_TIMEZONE', '+07:00'),
         ],
        //
        // 'mysql2' => [
        //     'driver'    => 'mysql',
        //     'host'      => env('DB2_HOST'),
        //     'port'      => env('DB2_PORT'),
        //     'database'  => env('DB2_DATABASE'),
        //     'username'  => env('DB2_USERNAME'),
        //     'password'  => env('DB2_PASSWORD'),
        //     'charset'   => 'utf8',
        //     'collation' => 'utf8_unicode_ci',
        //     'prefix'    => '',
        //     'strict'    => false,
        //     'timezone'  => env('DB_TIMEZONE', '+07:00'),
        // ],
    ],

    'redis' => [

        'client' => env('REDIS_CLIENT', 'predis'),

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => env('REDIS_DB', 0),
        ],

        'cache' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => env('REDIS_CACHE_DB', 1),
        ],

    ],

];
