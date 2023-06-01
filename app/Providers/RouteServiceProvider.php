<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
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
    // public const HOME = '/home';
    public const DASHBOARD = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });

        $this->mapUserRoutes();
    }

    protected function mapUserRoutes(){
        foreach (glob(base_path('routes/admin/*.php')) as $filename) {
           if (file_exists($filename)) {
               $namespace = basename($filename, '.php');
               Route::prefix('admin/' . $namespace)
                   ->middleware(['web','roles:1'])
                   ->namespace($this->namespace)
                   ->group($filename);
           }
       }

       foreach (glob(base_path('routes/user/*.php')) as $filename) {
        if (file_exists($filename)) {
            $namespace = basename($filename, '.php');
            Route::prefix('user/' . $namespace)
                ->middleware(['web','roles:1,2'])
                ->namespace($this->namespace)
                ->group($filename);
        }
    }
   }
}
