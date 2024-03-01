<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AuthCheckUser
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
        if (!(session()->has("LoggedUser"))) {
            return redirect(route("user.login"))->with("userFail", "Login first.");
        }

        // Passing down users data for the template
        $id = session("LoggedUser");
        $request->user = User::where("id", "=", $id)->first();

        return $next($request);
    }
}