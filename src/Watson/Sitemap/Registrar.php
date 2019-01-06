<?php

namespace Watson\Sitemap;

use Closure;
use Illuminate\Support\Collection;
use Watson\Sitemap\Definitions\Definition;
use Watson\Sitemap\Definitions\TagDefinition;
use Watson\Sitemap\Definitions\ModelDefinition;

class Registrar
{
    /**
     * Tag definitions added to the registrar.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $tagDefinitions;

    /**
     * Model definitions added to the registrar.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $modelDefinitions;

    /**
     * Instantiate a new sitemap registrar.
     *
     * @param  \Illuminate\Support\Collection  $tagDefinitions
     * @param  \Illuminate\Support\Collection  $modelDefinitions
     * @return void
     */
    public function __construct(Collection $tagDefinitions = null, Collection $modelDefinitions = null)
    {
        $this->tagDefinitions = $tagDefinitions ?: new Collection;
        $this->modelDefinitions = $modelDefinitions ?: new Collection;
    }

    /**
     * Add a definition to the sitemap.
     *
     * @param  string  $path
     * @return \Watson\Sitemap\Definitions\TagDefinition
     */
    public function add(string $path): TagDefinition
    {
        return $this->addTagDefinition(new TagDefinition($path));
    }

    /**
     * Add a path definition to the sitemap.
     *
     * @param  string  $path
     * @return \Watson\Sitemap\Definitions\TagDefinition
     */
    public function path(string $path): TagDefinition
    {
        return $this->add($path);
    }

    /**
     * Add a model definition to the sitemap.
     *
     * @param  string  $class
     * @param  \Closure  $routeCallback
     * @return \Watson\Sitemap\Definitions\ModelDefinition
     */
    public function model(string $class, Closure $routeCallback = null): ModelDefinition
    {
        return $this->addModelDefinition(
            new ModelDefinition($class, $routeCallback)
        );
    }

    /**
     * Get the tag definitions from the sitemap registrar.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getTagDefinitions(): Collection
    {
        return $this->tagDefinitions;
    }

    /**
     * Get the model definitions from the sitemap registrar.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getModelDefinitions(): Collection
    {
        return $this->modelDefinitions;
    }

    /**
     * Add a definition to the sitemap.
     *
     * @param  \Watson\Sitemap\Definitions\Definition  $definition
     * @return \Watson\Sitemap\Definitions\Definition
     */
    protected function addTagDefinition(Definition $definition): Definition
    {
        return $this->tagDefinitions[] = $definition;
    }

    /**
     * Add a model definition to the sitemap.
     *
     * @param  \Watson\Sitemap\Definitions\ModelDefinition  $definition
     * @return \Watson\Sitemap\Definitions\ModelDefinition
     */
    protected function addModelDefinition(ModelDefinition $definition): ModelDefinition
    {
        return $this->modelDefinitions[] = $definition;
    }
}
