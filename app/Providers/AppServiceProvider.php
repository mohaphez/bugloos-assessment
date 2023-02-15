<?php

namespace App\Providers;

use App\Contracts\Log\ILogService;
use App\Services\Log\LogService;
use Illuminate\Support\ServiceProvider;

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
        $this->app->singleton(ILogService::class, LogService::class);
    }
}