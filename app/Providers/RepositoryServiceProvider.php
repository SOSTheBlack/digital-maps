<?php

namespace App\Providers;

use App\Repositories\ApproximationRepositoryEloquent;
use App\Repositories\Contracts\ApproximationRepository;
use App\Repositories\Contracts\PointInterestRepository;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\PointInterestRepositoryEloquent;
use App\Repositories\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        $this->app->bind(PointInterestRepository::class, PointInterestRepositoryEloquent::class);
        $this->app->bind(ApproximationRepository::class, ApproximationRepositoryEloquent::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
    }
}
