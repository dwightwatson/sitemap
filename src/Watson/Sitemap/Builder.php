<?php

namespace Watson\Sitemap;

use Closure;
use Illuminate\Support\Collection;
use Watson\Sitemap\Definitions\Definition;
use Watson\Sitemap\Definitions\TagDefinition;
use Watson\Sitemap\Definitions\ModelDefinition;

class Builder
{
    /**
     * Definitions added to the builder
     *
     * @var \Illuminate\Support\Collection
     */
    protected $definitions;

    /**
     * Instantiate a new sitemap builder.
     *
     * @param  \Illuminate\Support\Collection
     * @return void
     */
    public function __construct(Collection $definitions = null)
    {
        $this->definitions = $definitions ?: new Collection;
    }

    /**
     * Add a definition to the sitemap.
     *
     * @param  string  $path
     * @return \Watson\Sitemap\Definitions\TagDefinition
     */
    public function add(string $path): TagDefinition
    {
        return $this->addDefinition(new TagDefinition($path));
    }

    /**
     * Add a model definition to the sitemap.
     *
     * @param  string  $class
     * @return \Watson\Sitemap\Definitions\ModelDefinition
     */
    public function model(string $class): \Watson\Sitemap\Definitions\ModelDefinition
    {
        $this->hasModelDefinitions = true;

        return $this->addDefinition(new ModelDefinition($class));
    }

    /**
     * Get the definitions from the sitemap builder.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getDefinitions(): Collection
    {
        return $this->definitions;
    }

    /**
     * Return whether the builder has any model definitions.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getModelDefinitions(): Collection
    {
        return $this->definitions->filter(function ($definition) {
            return $definition instanceof ModelDefinition;
        });
    }

    /**
     * Add a definition to the sitemap.
     *
     * @param  \Watson\Sitemap\Definitions\Definition  $definition
     * @return \Watson\Sitemap\Definitions\Definition
     */
    protected function addDefinition(Definition $definition): Definition
    {
        return $this->definitions[] = $definition;
    }
}
