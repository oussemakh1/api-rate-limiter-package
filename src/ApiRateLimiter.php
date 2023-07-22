<?php

namespace OussemaKhlifi\ApiRateLimiter;

use Illuminate\Cache\RateLimiter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ApiRateLimiter
{
    protected $RateLimiter;
    protected $TokensPerMinute;
    protected $MaxTokens;

    public function __construct(RateLimiter $RateLimiter, $TokensPerMinute = 60, $MaxTokens = 60) {

        $this->RateLimiter = $RateLimiter;
        $this->TokensPerMinute = $TokensPerMinute;
        $this->MaxTokens = $MaxTokens;
    }


    public function handle($request, $next) {

        $RateLimitKey = $this->GetRateLimitKey($request);

        if($this->RateExceeded($RateLimitKey)) {
            throw new HttpException(Response::HTTP_TOO_MANY_REQUESTS, 'Rate limit exceeded!');
        }

        return $next($request);
    }


    protected function GetRateLimitKey($request) {

        return $request->ip();
    }


    protected function RateExceeded($RateLimitKey) {

        $RateLimitCacheKey = 'api_rate_limit:' . $RateLimitKey;

        $TokensAvailable = $this->RateLimiter->hit($RateLimitCacheKey, 1);

        if($TokensAvailable >= $this->MaxTokens) {

            $this->RateLimiter->resetAttempts($RateLimitCacheKey);

        }

        return $TokensAvailable > $this->MaxTokens;

        
    }




}