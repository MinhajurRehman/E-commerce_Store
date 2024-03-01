<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;

class AuthCheckAdmin
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
        if (!(session()->has("LoggedAdmin"))) {
            return redirect(route("admin.login"))->with("adminFail", "Login first.");
        }

        // Passing down users data for the template
        $id = session("LoggedAdmin");
        $request->admin = Admin::where("id", "=", $id)->first();

        return $next($request);
    }
}