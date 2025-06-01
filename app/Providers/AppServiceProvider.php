<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Dao Registration
        $this->app->bind('App\Contracts\Dao\AdminDaointerface', 'App\Dao\AdminDao');
        $this->app->bind('App\Contracts\Dao\UserDaoInterface', 'App\Dao\UserDao');
        $this->app->bind('App\Contracts\Dao\AuthenticationDaoInterface', 'App\Dao\AuthenticationDao');
        $this->app->bind('App\Contracts\Dao\ResumeDaoInterface', 'App\Dao\ResumeDao');

        //Services Registration
        $this->app->bind('App\Contracts\Services\AdminServiceinterface', 'App\Services\AdminService');
        $this->app->bind('App\Contracts\Services\UserServiceInterface', 'App\Services\UserService');
        $this->app->bind('App\Contracts\Services\AuthenticationServiceInterface', 'App\Services\AuthenticationService');
        $this->app->bind('App\Contracts\Services\ResumeServiceInterface', 'App\Services\ResumeService');
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
