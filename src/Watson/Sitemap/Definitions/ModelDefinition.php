<?php

namespace Watson\Sitemap\Definitions;

use Closure;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Watson\Sitemap\Exceptions\NoRouteCallbackException;

class ModelDefinition extends Definition
{
    /**
     * Instantiate a new model definition.
     *
     * @param  string    $class
     * @param  \Closure  $routeCallback
     * @return void
     */
    public function __construct(string $class, Closure $routeCallback = null)
    {
        $this->class = $class;
        $this->routeCallback = $routeCallback;
    }

    /**
     * Get the model class.
     *
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Get a new instance of the model class.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getClassInstance(): Model
    {
        return new $this->class;
    }

    /**
     * Get an instance of the model query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getQuery(): Builder
    {
        return $this->class instanceof Builder ? $this->class : (new $this->model)->newQuery();
    }

    /**
     * Get the route callback.
     *
     * @return \Closure
     * @throws \Watson\Sitemap\Exceptions\NoRouteCallbackException
     */
    public function getRouteCallback(): Closure
    {
        if (is_null($this->routeCallback)) {
            throw new NoRouteCallbackException("No route callback defined for [{$this->getClass}]");
        }

        return $this->routeCallback;
    }

    /**
     * Set the route callback.
     *
     * @param  \Closure  $routeCallback
     * @return void
     */
    public function setRouteCallback(Closure $routeCallback): void
    {
        $this->routeCallback = $routeCallback;
    }

    /**
     * Alias to set thr route callback.
     *
     * @param  \Closure  $routeCallback
     * @return void
     */
    public function withRoute(Closure $routeCallback): void
    {
        $this->setRouteCallback($routeCallback);
    }

    /**
     * Get the route for a given instance of the model.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return string
     */
    public function getRoute(Model $model): string
    {
        return call_user_func($this->getRouteCallback(), $model);
    }

    /**
     * Get the last modified timestamp.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $instance
     * @return \DateTime
     */
    public function getLastModified(Model $instance = null): DateTime
    {
        // TODO: HOw IS THIS GOING TO WORK?

        return parent::getLastModified() ?: $instance->updated_at;
    }
}
