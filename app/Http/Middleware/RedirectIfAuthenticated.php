<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = auth()->user();
                if ($user->role == 'admin') {
                    return redirect()->route('admin.home');
                } elseif ($user->role == 'user') {
                    return redirect()->route('user.home');
                } elseif ($user->role == 'perawat') {
                    return redirect()->route('perawat.home');
                } else {
                    Auth::logout();
                    flash('Anda tidak memiliki hak akses')->error();
                    return redirect()->route('login');
                }
            }
        }

        return $next($request);
    }
    // public function handle(Request $request, Closure $next, string ...$guards): Response
    // {
    //     $guards = empty($guards) ? [null] : $guards;

    //     foreach ($guards as $guard) {
    //         if (Auth::guard($guard)->check()) {
    //             $user = auth()->user();
    //             if ( Auth::check() && $request->user()->role == 'admin') {
    //                 return redirect(RouteServiceProvider::HOME);
    //             } elseif ($user->role == 'user') {
    //                 return redirect(RouteServiceProvider::HOME);
    //             } else {
    //                 Auth::logout();
    //                 flash('Anda tidak memiliki hak akses')->error();
    //                 return redirect ()->route('login');
    //             }
    //         }
    //     }

    //     return $next($request);
    // }
}
