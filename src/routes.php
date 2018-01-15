<?php

use Watson\Sitemap\Renderer;

$router->get(config('sitemap.routing.prefix') . '{parameters?}', function (Renderer $renderer) {
    return $renderer;
})->where('parameters', '.+');
