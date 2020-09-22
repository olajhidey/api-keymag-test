<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Util;
use App\Models\User;

class checkAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $header = $request->bearerToken();

        if($header == null){
            return Util::generateJson(401, ['success'=>false, 'message'=> 'Unauthorized']);
        }else{
           $user = User::where('uid', $header)->first();
           if($user == null){
            return Util::generateJson(401, ['success'=>false, 'message'=> 'Unauthorized']);
           }
        }

        return $next($request);
    }
}
