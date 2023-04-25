<?php

namespace App\Providers;

use App\Models\Candy;
use App\Models\Ingredient;
use App\Models\User;
use App\Repositories\Eloquents\CandyEloquent;
use App\Repositories\Eloquents\IngredientEloquent;
use App\Repositories\Eloquents\UserEloquent;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('App\Repositories\Interfaces\CandyRepository', 'App\Repositories\Eloquents\CandyEloquent');
        $this->app->bind('App\Repositories\Interfaces\CandyRepository', function () {
            return new CandyEloquent(new Candy());
        });

        $this->app->bind('App\Repositories\Interfaces\IngredientRepository', 'App\Repositories\Eloquents\IngredientEloquent');
        $this->app->bind('App\Repositories\Interfaces\IngredientRepository', function () {
            return new IngredientEloquent(new Ingredient());
        });

        $this->app->bind('App\Repositories\Interfaces\UserRepository', 'App\Repositories\Eloquents\UserEloquent');
        $this->app->bind('App\Repositories\Interfaces\UserRepository', function () {
            return new UserEloquent(new User());
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
