<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{

    protected $role;

    public function __construct($role)
    {
        $this->role = $role;
    }

    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (!$request->user()) {
            abort(403, 'Unauthorized.');
        }

        // Check if the user has the required role
        if (!$request->user()->hasRole($this->role)) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }

}
