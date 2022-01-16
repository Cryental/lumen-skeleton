<?php

use jdavidbakr\CloudfrontProxies\CloudfrontProxies;
use LumenRateLimiting\ThrottleRequests;
use Monicahq\Cloudflare\Http\Middleware\TrustProxies;
use Spatie\ResponseCache\Middlewares\CacheResponse;

require_once __DIR__ . '/../vendor/autoload.php';

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
    dirname(__DIR__)
))->bootstrap();

date_default_timezone_set(env('APP_TIMEZONE', 'UTC'));

$app = new Laravel\Lumen\Application(
    dirname(__DIR__)
);

$app->withFacades();
$app->withEloquent();

$app->register(Chuckrincon\LumenConfigDiscover\DiscoverServiceProvider::class);
$app->register(Illuminate\Redis\RedisServiceProvider::class);

$app->register(App\Providers\AppServiceProvider::class);
$app->register(App\Providers\AuthServiceProvider::class);
$app->register(App\Providers\EventServiceProvider::class);
$app->register(Flipbox\LumenGenerator\LumenGeneratorServiceProvider::class);
$app->register(Spatie\ResponseCache\ResponseCacheServiceProvider::class);
$app->register(SwooleTW\Http\LumenServiceProvider::class);


$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->configure('app');

$app->middleware([
    App\Http\Middleware\TrustProxies::class,
    CloudfrontProxies::class,
    TrustProxies::class,
]);

$app->routeMiddleware([
    'cacheResponse' => CacheResponse::class,
    'throttle' => ThrottleRequests::class,
]);

$app->router->group([
    'namespace' => 'App\Http\Controllers',
    'middleware' => 'throttle:api',
], function ($router) {
    require __DIR__ . '/../routes/api.php';
});

return $app;
