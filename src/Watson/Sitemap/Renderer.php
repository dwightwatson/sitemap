<?php

namespace Watson\Sitemap;

use Watson\Sitemap\Builder;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\Support\Responsable;

class Renderer implements Renderable, Responsable
{
    /**
     * The sitemap builder.
     *
     * @var \Watson\Sitemap\Builder
     */
    protected $builder;

    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Create a new renderer instance.
     *
     * @param  \Watson\Sitemap\Builder  $builder
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Builder $builder, Request $request)
    {
        $this->builder = $builder;
        $this->request = $request;
    }

    /**
     * Get the evaluated contents of the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function render()
    {
        //
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse(Request $request)
    {
        return response(
            $this->render()
        );
    }
}
