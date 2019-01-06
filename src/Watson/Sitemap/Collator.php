<?php

namespace Watson\Sitemap;

use Watson\Sitemap\Definitions\ModelDefinition;

class Collator
{
    public function __construct(Registrar $registrar)
    {
        $this->registrar = $registrar;
    }

    public function totalTags()
    {
        return $this->registrar->getModelDefinitions()->reduce(function ($count, ModelDefinition $model) {
            return $count + $model->getQuery()->count();
        }, $this->registrar->getTagDefinitions()->count());
    }

    protected function totalModelTags()
    {
    }
}
