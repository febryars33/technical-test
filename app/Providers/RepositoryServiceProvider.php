<?php

namespace App\Providers;

use App\Repositories\BookRepositoryInterface;
use App\Repositories\Eloquent\BookRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);
    }
}
