<?php

namespace App\Http\Middleware;

use App\Exceptions\Store\InvalidStoreException;
use App\Services\StoreManager;
use Closure;
use Illuminate\Http\Request;

class IdentifyStore
{
    protected $storeManager;

    public function __construct(StoreManager $storeManager)
    {
        $this->storeManager = $storeManager;
    }

    /**
     * Handle an incoming request.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($this->storeManager->loadStore(parse_url($request->header('Referer'), PHP_URL_HOST))) {
            return $next($request);
        } else if ($this->storeManager->loadStore($request->header('X-Referer'))) {
            return $next($request);
        } else {
            throw new InvalidStoreException();
        }
    }
}
