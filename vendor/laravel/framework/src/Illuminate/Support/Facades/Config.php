<?php

namespace Illuminate\Support\Facades;

/**
 * @method static array all()
<<<<<<< HEAD
 * @method static bool has($key)
 * @method static mixed get($key, $default = null)
 * @method static void prepend($key, $value)
 * @method static void push($key, $value)
 * @method static void set($key, $value = null)
=======
 * @method static void macro(string $name, object|callable $macro, object|callable $macro = null)
 * @method static void mixin(object $mixin, bool $replace = true)
 * @method static bool hasMacro(string $name)
 * @method static void flushMacros()
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
 *
 * @see \Illuminate\Config\Repository
 */
class Config extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'config';
    }
}
