<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Services
use App\Services\Form\FormService;
use App\Services\Form\FormServiceInterface;

// Repositories
use App\Repositories\Link\LinkRepository;
use App\Repositories\Link\LinkRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Services
        $this->app->bind(FormServiceInterface::class,FormService::class);

        // Repositories
        $this->app->bind(LinkRepositoryInterface::class,LinkRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
