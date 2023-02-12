<?php

namespace App\Http\Middleware;

use App\Exceptions\Token\InvalidTokenException;
use App\Exceptions\Token\TokenNotFoundException;
use Closure;
use Illuminate\Http\Request;

class VerifyTgiToken
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
        $tokenPayload = $request->token;

        if ($tokenPayload) {
            if ($tokenPayload == config('jwt.token')) {

                return $next($request);
            }

            throw new InvalidTokenException();
        } else {

            throw new TokenNotFoundException();
        }
    }
}
