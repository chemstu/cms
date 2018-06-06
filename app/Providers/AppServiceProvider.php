<?php

namespace App\Providers;

use App\Models\Topic;
use App\Observers\TopicObserver;
use Illuminate\Support\Facades\Schema;
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
		\App\Models\User::observe(\App\Observers\UserObserver::class);
		\App\Models\Reply::observe(\App\Observers\ReplyObserver::class);

        Schema::defaultStringLength(191);  /*解决数据无法迁移问题，5.7.7以上没有改问题*/
        \Carbon\Carbon::setLocale('zh'); /*中文显示时间错*/
        Topic::observe(TopicObserver::class);//原來的教程是錯誤的，必須加這計

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
