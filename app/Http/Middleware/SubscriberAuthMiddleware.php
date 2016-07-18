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
        $email = $request->input('email');
        $test = bcrypt("test");

        if (Hash::check('test', $test)) {
            echo "matched";
        }
        die();

        $password = app('hash')->make($request->input('password'));

        echo $email. " ".$password;die();
        $sub = ApiSubscriber::where('email', $email)
            ->where('password', $password)->first();
        if (!$sub) {
            return response('Invalid API login credentials!', 401);
        }


        return $next($request);
    }
}
