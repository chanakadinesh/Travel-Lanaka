<?php
/**
 * Database configuration
 */

return [
    'settings'=>[
        'db'=>[
            'DB_USERNAME'=> 'root',
            'DB_PASSWORD'=> '',
            'DB_HOST'=> 'localhost',
            'DB_NAME'=> 'travel_lanka',
            'USER_CREATED_SUCCESSFULLY'=> 0,
            'USER_CREATE_FAILED'=> 1,
            'USER_ALREADY_EXISTED'=> 2
        ],
        'logger' => [
            'name' => 'my_logs',
            'path' => __DIR__.'/../logs/app.log'
        ],
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => true,
    ]
];