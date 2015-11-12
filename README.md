[![Build Status](https://travis-ci.org/GeneaLabs/laravel-appleseed-tests.svg)](https://travis-ci.org/GeneaLabs/laravel-appleseed-tests) [![Coverage Status](https://coveralls.io/repos/GeneaLabs/laravel-appleseed-tests/badge.svg?branch=master&service=github)](https://coveralls.io/github/GeneaLabs/laravel-appleseed-tests?branch=master)

![appleseed](https://cloud.githubusercontent.com/assets/1791050/11131698/cb6e8396-8940-11e5-8448-7fb94aaed51c.jpg)

## Reasoning
Eliminate error and server log entries that get thrown by missing favicons, especially the apple-touch-icon.png errors.

## Considerations
If you are seeing errors in your server logs, its for a reason: favicons are custom representations of your site, and
 its probably good to implemented them. This just provides a better user experience for the various devices and browsers
 that want them.

However, there are times when we just don't want to deal with this, and are spinning up in-house or small experimental
 projects that won't be used publicly like that. That's what this package is for. Simply add it via composer, and add
 middleware entry as describe below, and it will return 404s for the missing favicons without cluttering your logs.

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
Jesse Leite (@jesseleite85) provided lots of ideas and input on making this happen. Thanks!
