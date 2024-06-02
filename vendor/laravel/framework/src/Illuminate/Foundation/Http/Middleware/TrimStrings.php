<?php

namespace Illuminate\Foundation\Http\Middleware;

use Closure;
<<<<<<< HEAD
=======
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec

class TrimStrings extends TransformsRequest
{
    /**
     * All of the registered skip callbacks.
     *
     * @var array
     */
    protected static $skipCallbacks = [];

    /**
     * The attributes that should not be trimmed.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        foreach (static::$skipCallbacks as $callback) {
            if ($callback($request)) {
                return $next($request);
            }
        }

        return parent::handle($request, $next);
    }

    /**
     * Transform the given value.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return mixed
     */
    protected function transform($key, $value)
    {
<<<<<<< HEAD
        if (in_array($key, $this->except, true)) {
            return $value;
        }

        return is_string($value) ? preg_replace('~^\s+|\s+$~iu', '', $value) : $value;
=======
        $except = array_merge($this->except, static::$neverTrim);

        if ($this->shouldSkip($key, $except) || ! is_string($value)) {
            return $value;
        }

        return Str::trim($value);
    }

    /**
     * Determine if the given key should be skipped.
     *
     * @param  string  $key
     * @param  array  $except
     * @return bool
     */
    protected function shouldSkip($key, $except)
    {
        return in_array($key, $except, true);
    }

    /**
     * Indicate that the given attributes should never be trimmed.
     *
     * @param  array|string  $attributes
     * @return void
     */
    public static function except($attributes)
    {
        static::$neverTrim = array_values(array_unique(
            array_merge(static::$neverTrim, Arr::wrap($attributes))
        ));
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    }

    /**
     * Register a callback that instructs the middleware to be skipped.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public static function skipWhen(Closure $callback)
    {
        static::$skipCallbacks[] = $callback;
    }
}
