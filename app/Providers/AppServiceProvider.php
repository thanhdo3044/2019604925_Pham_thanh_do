<?php

namespace App\Providers;
use App\Interfaces\NotificationInterface;
use App\Service\MessegerService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->app->bind(NotificationInterface::class, MessegerService::class);
        Schema::defaultStringLength(191); // add: default varchar(191)
    }
}
