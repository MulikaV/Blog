<?php

namespace App\Providers;

use App\Comment;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Auth;
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
        view()->composer('admin._sidebar',function ($view){
            $view->with('newCommentsCount',Comment::where('status',0)->count());

        });
        view()->composer('admin.layout',function ($view){
            $view->with('user',Auth::user());

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
