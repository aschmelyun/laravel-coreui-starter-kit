<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Fideloper\Proxy\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
    protected $proxies;

    /**
     * The current proxy header mappings.
     *
     * @var array
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
