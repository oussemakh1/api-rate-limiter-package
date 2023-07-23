# API Rate Limiter Package for Laravel

The API Rate Limiter package provides a middleware for Laravel applications to implement rate limiting on incoming API requests using the Token Bucket Algorithm. Rate limiting helps prevent abuse of API resources and ensures fair access to the API for all users.

## Features

- **Token Bucket Algorithm:** Efficiently controls the rate of incoming API requests per user.
- **Customizable Rate Limits:** Set tokens generated per minute and maximum tokens allowed per user.
- **Middleware Integration:** Apply rate limiting to specific API routes or globally using the middleware.
- **Lightweight and Easy to Use:** Simple integration with Laravel applications.

## Installation

Install the package via Composer:

```bash
composer require oussema-khlifi/api-rate-limiter
```

## Usage

Import the ApiRateLimiterMiddleware in your App\Http\Kernel.php file.
Apply the middleware to specific API routes or globally in the middleware stack.

```php
use OussemaKhlifi\ApiRateLimiter\Middleware\ApiRateLimiterMiddleware;

protected $middlewareGroups = [
    'api' => [
        // Other middleware...
        ApiRateLimiterMiddleware::class,
    ],
];
```

## Configuration

The default rate limiting settings can be modified in the `config/api_rate_limiter.php` configuration file:

```php
return [
    'tokens_per_minute' => 60,
    'max_tokens' => 60,
];
```

## License
This package is open-source software licensed under the MIT License.

## Support
If you encounter any issues or have questions, please open an issue.

## Contribution
Contributions are welcome! If you wish to contribute, please fork the repository, create a new branch, and submit a pull request.


