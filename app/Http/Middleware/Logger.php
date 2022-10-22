<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Logger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        Log::info('[middleware] start run logger');
        $this->outputRequest($request);
        $response = $next($request);
        Log::info('[middleware] end run logger');
        return $response;
    }
    private function outputRequest(Request $request)
    {
        $requestMethod = $request->method();
        $requestParams = json_encode($request->all());
        Log::debug("{$requestMethod}: {$requestParams}");
    }
}
