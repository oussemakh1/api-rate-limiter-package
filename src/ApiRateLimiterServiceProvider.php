<?php 

namespace OussemaKhlifi\ApiRateLimiter;


use Illuminate\Support\ServiceProvider;
use OussemaKhlifi\ApiRateLimiter\Middleware\ApiRateLimiterMiddleware;


class ApiRateLimiterServiceProvider extends ServiceProvider
{

    public function register() {

        $this->mergeConfigFrom(__DIR__.'/../config/api_rate_limiter', ApiRateLimiterMiddleware::class);
    }


    public function boot() {

        $this->app['router']->aliasMiddleware('api-rate-limiter',ApiRateLimiterMiddleware::class);
        
        $this->publishes([
            __DIR__.'/../config/api_rate_limiter.php' => config_path('api_rate_limiter.php'),
        ]);
 
    }
}