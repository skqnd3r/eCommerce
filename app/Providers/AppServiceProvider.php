<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('admin', function() {
            return "<?php if(Auth::check() && Auth::user()->admin == 1): ?>";
        });
    
        Blade::directive('endadmin', function() {
            return "<?php endif; ?>";
        });
    }
}
