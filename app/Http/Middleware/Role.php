<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Role as Middleware;




class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
   
    public function handle(Request $request, Closure $next, String $role)
    {
        if (!Auth::check()) 
            if (!$request->expectsJson()) {
                return redirect('/login');
            } else {
                return response()->json(["message" => "Unauthenticated."]);
            }

        $user = Auth::user();
        if ($user->role == $role)//multi route
            return $next($request);

        return redirect('/home');
    }

     

}
