<?php

namespace Watson\Sitemap\Definitions;

use Illuminate\Database\Eloquent\Model;

class ModelDefinition extends Definition
{
    public function __construct($class, $routeCallback)
    {
        $this->class = $class;
        $this->routeCallback = $routeCallback;
    }

    public function getClass()
    {
        return $this->class;
    }

    public function getClassInstance()
    {
        return new $this->class;
    }

    public function getRouteCallback()
    {
        return $this->routeCallback;
    }

    public function getRoute(Model $model)
    {
        return call_user_func($this->getRouteCallback, $model);
    }
}