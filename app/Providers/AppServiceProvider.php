<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.menu_sidebar', function($view){
            $categories=\App\Category::withTranslation(\App::getLocale())->orderBy('order')->get();
            $view->with(compact('categories'));
        });

        view()->composer('sections.info', function($view){
            $str=file_get_contents("http://cbu.uz/ru/arkhiv-kursov-valyut/json/");
            $json=json_decode($str, true);
            $view->with(compact('json'));
        });

        view()->composer('layouts.latest_posts_sidebar', function($view){
            if(\App::getLocale()=='o`z'){
                $posts=\App\Post::withTranslation(\App::getLocale())
                ->latest()
                ->limit(6)
                ->whereTranslation('title', '!=', '', [\App::getLocale()])
                ->get();
            }else{
                $posts=\App\Post::withTranslation(\App::getLocale())
                ->latest()
                ->limit(6)
                ->whereTranslation('title', '!=', '', [\App::getLocale()],false)
                ->get();
            }
            $view->with(compact('posts'));
        });

        view()->composer('sections.latest_posts_mobile', function($view){
            if(\App::getLocale()=='o`z'){
                $latests_posts=\App\Post::withTranslation(\App::getLocale())
                ->latest()
                ->limit(6)
                ->whereTranslation('title', '!=', '', [\App::getLocale()])
                ->get();
            }else{
                $latests_posts=\App\Post::withTranslation(\App::getLocale())
                ->latest()
                ->limit(6)
                ->whereTranslation('title', '!=', '', [\App::getLocale()],false)
                ->get();
            }
            $view->with(compact('latests_posts'));
        });

        view()->composer('sections.top_posts', function($view){
            $date = \Carbon\Carbon::today()->subDays(15);
            if(\App::getLocale()=='o`z'){
                $top_posts=\App\Post::withTranslation(\App::getLocale())
                ->where('created_at', '>=', $date)
                ->orderBy('view', 'desc')
                ->limit(6)
                ->whereTranslation('title', '!=', '', [\App::getLocale()])
                ->get();
            }else{
                $top_posts=\App\Post::withTranslation(\App::getLocale())
                ->where('created_at', '>=', $date)
                ->orderBy('view', 'desc')
                ->limit(6)
                ->whereTranslation('title', '!=', '', [\App::getLocale()],false)
                ->get();
            }
            
            $view->with(compact('top_posts'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
