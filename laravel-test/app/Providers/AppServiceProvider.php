<?php

namespace App\Providers;

use App\Models\CarRepository;
use App\Repositories\EloquentCarRepository;
use App\Services\CarService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        CarRepository::class => EloquentCarRepository::class,
        CarService::class => CarService::class,
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
        //
    }
}
