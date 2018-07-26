<?php

namespace App\Http\Middleware;

use Closure;
use Gate;
use Auth;

class Admin
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
        if(Gate::denies('admin')){
            $authUser = Auth::user();
            Auth::logout($authUser);
            // return redirect()->route("index");
            return redirect()->route("login"); // ->back()->with('message','Доступ запрещен.');
        }
        // return redirect()->route("admin.dashboard");
        return $next($request);
    }
}
