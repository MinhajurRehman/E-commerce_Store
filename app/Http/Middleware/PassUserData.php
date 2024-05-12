<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PassUserData
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
        $request->cartCount = 0;
        
        if (session()->has("LoggedUser") ) {
            $id = session("LoggedUser");
            $request->user = User::where("id", "=", $id)->first();
            $request->cartCount = Cart::where("user_id", Session::get('LoggedUser'))->count();
        }
        return $next($request);
    }
}
