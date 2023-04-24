<?php

namespace App\Providers;

use App\Models\Candy;
use App\Repositories\Eloquents\CandyEloquent;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('App\Repositories\Interfaces\CandyRepository', 'App\Repositories\Eloquents\CandyEloquent');
        $this->app->bind('App\Repositories\Interfaces\CandyRepository', function(){
            return new CandyEloquent(new Candy());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
