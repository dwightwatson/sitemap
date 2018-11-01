<?php

namespace Watson\Sitemap\Controllers;

use Illuminate\Http\Request;
use Watson\Sitemap\{Compiler, Renderer};
use Illuminate\Contracts\Support\Renderable;

class SitemapController
{
    /**
     * The sitemap compiler.
     *
     * @var \Watson\Sitemap\Compiler
     */
    protected $compiler;

    /**
     * Create a new controller instance.
     *
     * @param  \Watson\Sitemap\Compiler  $compiler
     * @return void
     */
    public function __construct(Compiler $compiler)
    {
        $this->compiler = $compiler;
    }

    /**
     * Respond to the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Watson\Sitemap\Renderer
     */
    public function __invoke(Request $request): Renderable
    {
        return new \Watson\Sitemap\Renderers\Sitemap(collect());
    }
}
