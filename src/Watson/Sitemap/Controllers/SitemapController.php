<?php

namespace Watson\Sitemap\Controllers;

use Watson\Sitemap\Compiler;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;
use Watson\Sitemap\Renderers\{Index, Sitemap};

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
        if ($this->wantsIndex($request)) {

            return new Index($this->compiler->getIndexTags());
        }

        if ($this->wantsTags($request)) {
            $definitions = $this->compiler->getIndexTags($request->page);

            // return new Sitemap($this->compiler->getTags());
        }

        if ($model = $this->wantsModel($request)) {
            $definitions = $this->compiler->getModelTags($model, $request->page);

            return new Sitemap($definitions);
        }

        return abort(404);
    }

    /**
     * Whether the request is for the sitemap index.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function wantsIndex(Request $request): bool
    {
        return $request->is('sitemaps');
    }
}
