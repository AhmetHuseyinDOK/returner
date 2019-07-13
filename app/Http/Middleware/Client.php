<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Client as Website;
class Client
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Website::where('host',$request->getHost())->firstOrFail();
        return $next($request);
    }
}
