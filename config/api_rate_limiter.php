<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Tokens Per Minute
    |--------------------------------------------------------------------------
    |
    | This value represents the default number of tokens generated per minute
    | for rate limiting. The tokens are used to control the number of API
    | requests allowed per minute for each user.
    |
    */

    'tokens_per_minute' => 60,

    /*
    |--------------------------------------------------------------------------
    | Default Maximum Tokens
    |--------------------------------------------------------------------------
    |
    | This value represents the default maximum number of tokens allowed
    | per user for rate limiting. Once the token bucket is full, the
    | API requests will be rate-limited until tokens are replenished.
    |
    */

    'max_tokens' => 60,
];
