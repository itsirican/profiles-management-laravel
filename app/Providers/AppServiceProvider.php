<?php

namespace App\Providers;

use App\Models\Publication;
use Illuminate\Auth\GenericUser;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
    
    
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        // Gate::define('update-pub', function(GenericUser $profile, Publication $publication) {
        //     return $profile->id === $publication->profile->id;
        // });
    }
}