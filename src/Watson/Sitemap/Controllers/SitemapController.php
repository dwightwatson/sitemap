<?php

namespace Watson\Sitemap\Controllers;

use Illuminate\Http\Request;
use Watson\Sitemap\{Registrar, Renderer};

class SitemapController
{
    /**
     * The sitemap tags registrar.
     *
     * @var \Watson\Sitemap\Registrar
     */
    protected $registrar;

    /**
     * Create a new controller instance.
     *
     * @param  \Watson\Sitemap\Registrar  $registrar
     * @return void
     */
    public function __construct(Registrar $registrar)
    {
        $this->registrar = $registrar;
    }

    /**
     * Respond to the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Watson\Sitemap\Renderer
     */
    public function __invoke(Request $request): Renderer
    {
        //
    }
}
