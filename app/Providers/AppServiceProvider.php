<?php

namespace App\Providers;

use App\Models\Laboratory;
use App\Models\User;
use App\Policies\LaboratoryPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
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
        Route::resourceVerbs(['create'=>'novo', 'edit'=>'editar']);
        //Gate::policy(Laboratory::class, LaboratoryPolicy::class);
        //Gate::define('viewg',[LaboratoryPolicy::class, 'view']);

        Gate::define('isAdmin', function (User $user) {
            return $user->role === 'admin';
        });
    }
}
