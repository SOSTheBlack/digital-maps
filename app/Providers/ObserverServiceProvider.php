<?php

namespace App\Providers;

use App\Models\PointInterest;
use App\Models\User;
use App\Observers\PointInterestObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);
        PointInterest::observe(PointInterestObserver::class);
    }
}
