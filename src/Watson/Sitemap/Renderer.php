<?php

namespace Watson\Sitemap;

use Illuminate\Http\Request;
use Watson\Sitemap\Registrar;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\Support\Responsable;

class Renderer implements Renderable, Responsable
{
    /**
     * The sitemap registrar.
     *
     * @var \Watson\Sitemap\Registrar
     */
    protected $registrar;

    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Create a new renderer instance.
     *
     * @param  \Watson\Sitemap\Registrar  $registrar
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Registrar $registrar, Request $request)
    {
        $this->registrar = $registrar;
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
    public function toResponse($request)
    {
        return response(
            $this->render()
        );
    }
}
