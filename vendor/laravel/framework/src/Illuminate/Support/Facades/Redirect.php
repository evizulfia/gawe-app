<?php

namespace Illuminate\Support\Facades;

/**
 * @method static \Illuminate\Http\RedirectResponse action(string $action, mixed $parameters = [], int $status = 302, array $headers = [])
 * @method static \Illuminate\Http\RedirectResponse away(string $path, int $status = 302, array $headers = [])
 * @method static \Illuminate\Http\RedirectResponse back(int $status = 302, array $headers = [], $fallback = false)
 * @method static \Illuminate\Http\RedirectResponse guest(string $path, int $status = 302, array $headers = [], bool $secure = null)
 * @method static \Illuminate\Http\RedirectResponse home(int $status = 302)
 * @method static \Illuminate\Http\RedirectResponse intended(string $default = '/', int $status = 302, array $headers = [], bool $secure = null)
 * @method static \Illuminate\Http\RedirectResponse refresh(int $status = 302, array $headers = [])
 * @method static \Illuminate\Http\RedirectResponse route(string $route, mixed $parameters = [], int $status = 302, array $headers = [])
 * @method static \Illuminate\Http\RedirectResponse secure(string $path, int $status = 302, array $headers = [])
 * @method static \Illuminate\Http\RedirectResponse signedRoute(string $name, mixed $parameters = [], \DateTimeInterface|\DateInterval|int $expiration = null, int $status = 302, array $headers = [])
 * @method static \Illuminate\Http\RedirectResponse temporarySignedRoute(string $name, \DateTimeInterface|\DateInterval|int $expiration, mixed $parameters = [], int $status = 302, array $headers = [])
 * @method static \Illuminate\Http\RedirectResponse to(string $path, int $status = 302, array $headers = [], bool $secure = null)
 * @method static \Illuminate\Routing\UrlGenerator getUrlGenerator()
 * @method static void setSession(\Illuminate\Session\Store $session)
<<<<<<< HEAD
 * @method static void setIntendedUrl(string $url)
=======
 * @method static string|null getIntendedUrl()
 * @method static \Illuminate\Routing\Redirector setIntendedUrl(string $url)
 * @method static void macro(string $name, object|callable $macro, object|callable $macro = null)
 * @method static void mixin(object $mixin, bool $replace = true)
 * @method static bool hasMacro(string $name)
 * @method static void flushMacros()
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
 *
 * @see \Illuminate\Routing\Redirector
 */
class Redirect extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'redirect';
    }
}
