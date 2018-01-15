<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Caching
    |--------------------------------------------------------------------------
    |
    | Control whether sitemaps should be cached and if so the length of time
    | in minutes that they should remain cached for.
    |
    */

    'cache' => [
        'enabled' => true,

        'minutes' => 1440,
    ],

    /*
    |--------------------------------------------------------------------------
    | Routing
    |--------------------------------------------------------------------------
    |
    | Control the routing prefix that will be used to serve sitemaps to clients.
    |
    */

    'routing' => [
        'prefix' => 'sitemaps',
    ],
];
