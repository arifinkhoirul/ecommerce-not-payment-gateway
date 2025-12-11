<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = auth()->user();

        $request->session()->put('name', $user->name);
        $request->session()->put('email', $user->email);
        $request->session()->put('id', $user->id);

        if(!in_array($user->utype, $roles)) {
            abort(403, 'kamu tidak punya hak akses ke halaman ini');
        }

        return $next($request);
    }
}
