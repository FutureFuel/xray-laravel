<?php

declare(strict_types=1);

namespace Futurefuel\Xray\Middleware;

use Closure;
use Futurefuel\Xray\Xray;

class RequestTracing
{
    /**
     * @var \Futurefuel\Xray\Xray
     */
    private $xray;

    public function __construct(Xray $xray)
    {
        $this->xray = $xray;
    }

    public function handle($request, Closure $next)
    {
        return $next($request);
    }

    /**
     * Terminates a request/response cycle.
     */
    public function terminate($request, $response)
    {
        $this->xray->submitHttpTracer($response);
    }
}
