<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckMembership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->membership == true) {
            return redirect('/pricing');
        }

        log::info('Before Request:', [
            'url' => $request->url(),
            'params' => $request->all()
        ]);

        $response = $next($request);

        sleep(2);

        log::info('After Request:', [
            'status' => $response->getStatusCode(),
            'content' => $response->getContent()
        ]);

        return $response;
    }
}
