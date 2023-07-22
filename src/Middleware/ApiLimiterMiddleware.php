<?php 

namespace OussemaKhlifi\ApiRateLimiter\Middleware;


use Closure;
use OussemaKhlifi\ApiRateLimiter\ApiRateLimiter;

class ApiRateLimiterMiddleware 
{

    protected $RateLimiter;

    public function __construct(ApiRateLimiter $RateLimiter) {
        
        $this->RateLimiter = $RateLimiter;
    }


    public function handle($request, Closure $next, $TokensPerMinute = 60, $MaxTokens = 60) {

        return $this->RateLimiter->handle($request, $next);
    }
}