<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Paging
    |--------------------------------------------------------------------------
    |
    | Here you may choose the maximum number of tags to be displayed for each
    | sitemap. Google supports a maximum of 50,000 tags or a maximum filesize
    | of 10MB, so adjust this as necessary.
    |
    */
    'per_page' => 50000,

    /*
    |--------------------------------------------------------------------------
    | Caching
    |--------------------------------------------------------------------------
    |
    | Here you may enable or disable caching of sitemaps for each time they
    | are generated. You can also specify the length of time (in minutes)
    | they will remain cached.
    |
    */

    'cache_enabled' => true,
    
    'cache_minutes' => 1440,

    /*
    |--------------------------------------------------------------------------
    | Routing
    |--------------------------------------------------------------------------
    |
    | Here you may adjust the routing mechanism for the sitemap including
    | the prefix for the sitemaps, and the controller/action pair used
    | to handle routing and rendering of the entire sitemap tree.
    |
    */

    'route_prefix'  => 'sitemaps',

    'route_handler' => Watson\Sitemap\SitemapsController::class . '@sitemap'
];
