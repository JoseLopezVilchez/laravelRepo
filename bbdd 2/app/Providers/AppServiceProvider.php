<?php

namespace App\Providers;

use App\Models\Alumno;
use App\Policies\AlumnoPolicy;
use Illuminate\Pagination\Paginator;
// use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    //Array con todas las policies que utiliza la aplicación
    protected $policies = [
        Alumno::class => AlumnoPolicy::class,
    ];


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
        $this->registerPolicies();

        Paginator::useBootstrap();
    }
}
