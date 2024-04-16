<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')->prefix('api')->group(base_path('routes/api.php'));

            Route::middleware('web')->group(base_path('routes/web.php'));

            // Mengarahkan pengguna ke rute yang sesuai berdasarkan peran
            Route::middleware('web')->group(function () {
                Route::get('/home', function () {
                    $user = Auth::user();

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
                })->name('home');
            });
        });
    }
}
