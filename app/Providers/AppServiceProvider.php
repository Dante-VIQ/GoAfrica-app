<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Destination;
use App\Policies\BlogPolicy;
use App\Policies\DestinationPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // if ($this->app->environment('local')) {
        //     $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
        //     $this->app->register(TelescopeServiceProvider::class);
        // }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Blog::class, BlogPolicy::class);
        Gate::policy(Destination::class, DestinationPolicy::class);
        Gate::policy(About::class, AboutPolicy::class);
        Gate::policy(Header::class, HeaderPolicy::class);


    }
}
