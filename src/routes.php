<?php

get(config('sitemap.route_prefix') . '{parameters?}', function (Watson\Sitemap\Renderer $renderer) {
    return $renderer;
})->where('parameters', '.+');