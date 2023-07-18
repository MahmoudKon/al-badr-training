<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class CheckAuthorized
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if ($request->routeIs('dashboard.*')) {// '/dasboard/*/$permission'
            $routeName = $request->route()->getName();

            $permission_array =explode(',', Auth::user()->role) ;
            foreach($permission_array as $permission){
                if(strpos($routeName, $permission)){
                    return $next($request);
                }
            }
        }

        return redirect()->back();

    }
}
