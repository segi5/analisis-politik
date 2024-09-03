<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register TwitterOAuth service as a singleton
        $this->app->singleton(TwitterOAuth::class, function ($app) {
            return new TwitterOAuth(
                config('twitter.consumer_key'),
                config('twitter.consumer_secret'),
                config('twitter.access_token'),
                config('twitter.access_token_secret')
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // No boot logic needed for this service provider
    }
}
