<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\ApiSubscriber;
use Illuminate\Support\Facades\Hash;

class SubscriberAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $key = app('request')->header('key');
        $secret = app('request')->header('secret');

        if($key){
            $sub = ApiSubscriber::where('email', $key)->first();

            if (!Hash::check($secret, $sub->password)) {
                return response('Invalid API login credentials!', 401);
            }

        } else {
            return response('Invalid API login credentials!', 401);
        }

        return $next($request);
    }
}
