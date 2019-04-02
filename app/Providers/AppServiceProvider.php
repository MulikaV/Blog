<?php

namespace App\Providers;

use App\Post;
use App\Category;
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
        view()->composer('pages._sidebar',function ($view){
           $view->with('popularPost',Post::getPopularPosts());
           $view->with('featuredPost',Post::getFeaturedPosts());
           $view->with('resentPost',Post::getResentPosts());
           $view->with('categories',Category::all());
        });
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
