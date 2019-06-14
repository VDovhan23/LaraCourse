<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\BlogPost;
use App\Observers\BlogPostObserver;
use App\Observers\BlogСategoryObserver;
use App\Models\BlogCategory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        BlogPost::observe(BlogPostObserver::class);
        BlogCategory::observe(BlogСategoryObserver::class);
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
