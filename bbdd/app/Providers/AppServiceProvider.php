<?php

namespace App\Providers;

//use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Alumno;
use App\Policies\AlumnoPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider

{

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
