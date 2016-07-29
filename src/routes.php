<?php

use Watson\Sitemap\Renderer;

$router->get(config('sitemap.route_prefix') . '{parameters?}', function (Renderer $renderer) {
    return $renderer;
})->where('parameters', '.+');
