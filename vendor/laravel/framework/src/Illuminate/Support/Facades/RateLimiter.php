<?php

namespace Illuminate\Support\Facades;

/**
 * @method static \Illuminate\Cache\RateLimiter for(string $name, \Closure $callback)
<<<<<<< HEAD
 * @method static \Closure limiter(string $name)
 * @method static bool tooManyAttempts($key, $maxAttempts)
 * @method static int hit($key, $decaySeconds = 60)
 * @method static mixed attempts($key)
 * @method static mixed resetAttempts($key)
 * @method static int retriesLeft($key, $maxAttempts)
 * @method static void clear($key)
 * @method static int availableIn($key)
 * @method static bool attempt($key, $maxAttempts, \Closure $callback, $decaySeconds = 60)
=======
 * @method static \Closure|null limiter(string $name)
 * @method static mixed attempt(string $key, int $maxAttempts, \Closure $callback, int $decaySeconds = 60)
 * @method static bool tooManyAttempts(string $key, int $maxAttempts)
 * @method static int hit(string $key, int $decaySeconds = 60)
 * @method static int increment(string $key, int $decaySeconds = 60, int $amount = 1)
 * @method static int decrement(string $key, int $decaySeconds = 60, int $amount = 1)
 * @method static mixed attempts(string $key)
 * @method static mixed resetAttempts(string $key)
 * @method static int remaining(string $key, int $maxAttempts)
 * @method static int retriesLeft(string $key, int $maxAttempts)
 * @method static void clear(string $key)
 * @method static int availableIn(string $key)
 * @method static string cleanRateLimiterKey(string $key)
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
 *
 * @see \Illuminate\Cache\RateLimiter
 */
class RateLimiter extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Illuminate\Cache\RateLimiter::class;
    }
}
