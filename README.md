# Laravel Appleseed
## Reasoning
Eliminate error and server log entries that get thrown by missing favicons, especially the apple-touch-icon.png errors.

### Dependencies
- Your project should be running Laravel 5+.

## Installation
1. Install Laravel Appleseed via composer:
  ```sh
  composer require genealabs/laravel-appleseed
  ```

2. Add the middleware entry in `app/Http/Kernel.php` directly after the maintenance mode middleware:
  ```php
  /*
      protected $middleware = [
          \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
  */
          \GeneaLabs\LaravelAppleseed\Http\Middleware\FaviconInterceptor::class,
  /*
          [...]
      ];
  */
  ```

## Usage
That was it! It will inspect each route for favicon requests and handle it appropriately.

## Credits
Jesse Leite (@jesselite85) provided lots of ideas and input on making this happen. Thanks!
