<?php

namespace Watson\Sitemap\Compilers;

use Illuminate\Support\Collection;

class ModelCompiler extends Compiler
{
    /**
     * The model definition.
     *
     * @var \Watson\Sitemap\Definitions\ModelDefinition
     */
    protected $definition;

    /**
     * Create a new model compiler.
     *
     * @param  \Watson\Sitemap\Definitions\ModelDefinition  $definition
     * @return void
     */
    public function __construct(ModelDefinition $definition)
    {
        $this->definition = $definition;
    }

    /**
     * Get the tag definitions for the given page.
     *
     * @param  int  $page
     * @return \Illuminate\Support\Collection
     */
    public function getPage(int $page = 1): Collection
    {
        $models = $this->definition->getQuery()
            ->skip($this->getPaginationOffset($page))
            ->take($perPage)
            ->get();

        return $records->map(function ($model) {
            $path = call_user_func($this->definition->getRouteCallback(), $model);

            return (new TagDefinition($path))->modified($model->updated_at);
        });
    }

    /**
     * Get the number of pages required by the tag definition>
     *
     * @return int
     */
    public function getPageCount(): int
    {
        $total = $this->definition->getQuery()->count();

        return parent::getPageCount($total);
    }
}
