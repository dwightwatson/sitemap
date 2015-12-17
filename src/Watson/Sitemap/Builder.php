<?php

namespace Watson\Sitemap;

use Closure;
use Illuminate\Http\Request;

class Builder
{
    /**
     * Definitions added to the builder
     *
     * @var array
     */
    protected $definitions = [];

    /**
     * Add a tag to the sitemap (alias for addTag).
     *
     * @param  string  $location
     * @param  mixed   $lastModified
     * @param  mixed   $changeFrequency
     * @param  mixed   $priority
     * @return $this
     */
    public function tag($location, $lastModified, $changeFrequency, $priority)
    {
        return $this->addTag($location, $lastModified, $changeFrequency, $priority);
    }

    /**
     * Add a tag to the sitemap.
     *
     * @param  string  $location
     * @param  mixed   $lastModified
     * @param  mixed   $changeFrequency
     * @param  mixed   $priority
     * @return $this
     */
    public function addTag($location, $lastModified, $changeFrequency, $priority)
    {
        $this->definitions = new Tag($location, $lastModified, $changeFrequency, $priority);

        return $this;
    }


    /**
     * Add a model definition to the sitemap.
     *
     * @param  string    $class
     * @param  \Closure  $routeCallback
     * @return $this
     */
    public function model($class, Closure $routeCallback)
    {
        return $this->addModel($class, $routeCallback);
    }

    /**
     * Add a model definition to the sitemap.
     *
     * @param  string    $class
     * @param  \Closure  $routeCallback
     * @return $this
     */
    public function addModel($class, Closure $routeCallback)
    {
        $this->definitions[] = new ModelDefinition($class, $routeCallback);

        return $this;
    }

    /**
     * Get the definitions from the sitemap builder.
     *
     * @return array
     */
    public function getDefinitions()
    {
        return $this->definitions;
    }
}