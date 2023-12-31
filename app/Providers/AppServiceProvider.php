<?php

namespace App\Providers;

use App\Comment\CommentClass;
use App\Comment\CommentContract;
use App\Message\MessageClass;
use App\Message\MessageContract;
use App\Post\PostClass;
use App\Post\PostContract;
use App\Profile\ProfileClass;
use App\Profile\ProfileContract;
use App\SocialMedia\SocialMediaClass;
use App\SocialMedia\SocialMediaContract;
use App\Tag\TagClass;
use App\Tag\TagContract;
use App\View\ViewClass;
use App\View\ViewContract;
use Illuminate\Support\ServiceProvider;
use App\User\UserClass;
use App\User\UserContract;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(UserContract::class,UserClass::class);
        $this->app->singleton(TagContract::class,TagClass::class);
        $this->app->singleton(ProfileContract::class,ProfileClass::class);
        $this->app->singleton(MessageContract::class,MessageClass::class);
        $this->app->singleton(SocialMediaContract::class,SocialMediaClass::class);
        $this->app->singleton(PostContract::class,PostClass::class);
        $this->app->singleton(ViewContract::class,ViewClass::class);
        $this->app->singleton(CommentContract::class,CommentClass::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Paginator::useBootstrap();
    }
}
