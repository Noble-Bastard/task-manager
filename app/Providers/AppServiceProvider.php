<?php

namespace App\Providers;

use Domain\Tasks\Interfaces\TaskRepository;
use Domain\Tasks\Interfaces\TaskService;
use Domain\Tasks\Repositories\TaskRepositoryImplementation;
use Domain\Tasks\Services\TaskServiceImplementation;
use Illuminate\Pagination\Paginator;
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
        $this->app->bind(TaskService::class, TaskServiceImplementation::class);
        $this->app->bind(TaskRepository::class, TaskRepositoryImplementation::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
