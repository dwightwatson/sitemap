<?php

namespace Watson\Sitemap\Controllers;

use Watson\Sitemap\{Registrar, Request};
use Illuminate\Contracts\Support\Renderable;
use Watson\Sitemap\Renderers\{Index, Sitemap};
use Watson\Sitemap\Compilers\{ModelCompiler, TagCompiler};

class SitemapController
{
    /**
     * The sitemap registrar.
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
     * @param  \Watson\Sitemap\Request  $request
     * @return \Watson\Sitemap\Renderer
     */
    public function __invoke(Request $request): Renderable
    {
        if ($request->wantsIndex()) {
            return new Index($this->compiler->getIndexTags());
        }

        if ($request->wantsTags()) {
            // $definitions = $this->compiler->getIndexTags($request->page);

            // return new Sitemap($this->compiler->getTags());
        }

        $supportedModels = $this->registrar->getModelDefinitions()->map(function ($definition) {
            $class = $definition->getClass();
            return (new $class)->getTable();
        });

        if ($model = $request->wantsModel($supportedModels)) {
            $definitions = $this->compiler->getModelTags($model, $request->page);

            return new Sitemap($definitions);
        }

        return abort(404);
    }
}
