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
     * The length of time to cache responses.
     *
     * @var int
     */
    protected $cacheMinutes;

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
     * Get the length of time to cache responses.
     *
     * @return int|null
     */
    public function getCacheMinutes(): ?int
    {
        return $this->cacheMinutes;
    }

    /**
     * Set the length of time to cache responses.
     *
     * @param  int  $minutes
     * @return $this
     */
    public function setCacheMinutes(int $minutes)
    {
        $this->cacheMinutes = $minutes;

        return $this;
    }

    /**
     * Set the length of time to cache responses.
     *
     * @param  int  $minutes
     * @return $this
     */
    public function cache(int $minutes)
    {
        return $this->setCacheMinutes($minutes);
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
     * @return \Watson\Sitemap\Definitions\ModelDefinition
     */
    public function model(string $class): ModelDefinition
    {
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
     * Return a list of regular tag definitions.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getTagDefinitions(): Collection
    {
        return $this->definitions->filter(function ($definition) {
            return $definition instanceof TagDefinition;
        });
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
