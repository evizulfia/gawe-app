<?php

namespace Illuminate\Support\Facades;

use Laravel\Ui\UiServiceProvider;
use RuntimeException;

/**
 * @method static \Illuminate\Auth\AuthManager extend(string $driver, \Closure $callback)
 * @method static \Illuminate\Auth\AuthManager provider(string $name, \Closure $callback)
 * @method static \Illuminate\Contracts\Auth\Authenticatable loginUsingId(mixed $id, bool $remember = false)
 * @method static \Illuminate\Contracts\Auth\Authenticatable|null user()
 * @method static \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard guard(string|null $name = null)
 * @method static \Illuminate\Contracts\Auth\UserProvider|null createUserProvider(string $provider = null)
 * @method static \Symfony\Component\HttpFoundation\Response|null onceBasic(string $field = 'email',array $extraConditions = [])
 * @method static bool attempt(array $credentials = [], bool $remember = false)
 * @method static bool hasUser()
 * @method static bool check()
 * @method static bool guest()
 * @method static bool once(array $credentials = [])
 * @method static bool onceUsingId(mixed $id)
 * @method static bool validate(array $credentials = [])
 * @method static bool viaRemember()
 * @method static bool|null logoutOtherDevices(string $password, string $attribute = 'password')
 * @method static int|string|null id()
 * @method static void login(\Illuminate\Contracts\Auth\Authenticatable $user, bool $remember = false)
 * @method static void logout()
 * @method static void logoutCurrentDevice()
<<<<<<< HEAD
 * @method static void setUser(\Illuminate\Contracts\Auth\Authenticatable $user)
 * @method static void shouldUse(string $name);
=======
 * @method static \Illuminate\Contracts\Auth\Authenticatable|null logoutOtherDevices(string $password)
 * @method static void attempting(mixed $callback)
 * @method static \Illuminate\Contracts\Auth\Authenticatable getLastAttempted()
 * @method static string getName()
 * @method static string getRecallerName()
 * @method static \Illuminate\Auth\SessionGuard setRememberDuration(int $minutes)
 * @method static \Illuminate\Contracts\Cookie\QueueingFactory getCookieJar()
 * @method static void setCookieJar(\Illuminate\Contracts\Cookie\QueueingFactory $cookie)
 * @method static \Illuminate\Contracts\Events\Dispatcher getDispatcher()
 * @method static void setDispatcher(\Illuminate\Contracts\Events\Dispatcher $events)
 * @method static \Illuminate\Contracts\Session\Session getSession()
 * @method static \Illuminate\Contracts\Auth\Authenticatable|null getUser()
 * @method static \Symfony\Component\HttpFoundation\Request getRequest()
 * @method static \Illuminate\Auth\SessionGuard setRequest(\Symfony\Component\HttpFoundation\Request $request)
 * @method static \Illuminate\Support\Timebox getTimebox()
 * @method static \Illuminate\Contracts\Auth\Authenticatable authenticate()
 * @method static \Illuminate\Auth\SessionGuard forgetUser()
 * @method static \Illuminate\Contracts\Auth\UserProvider getProvider()
 * @method static void setProvider(\Illuminate\Contracts\Auth\UserProvider $provider)
 * @method static void macro(string $name, object|callable $macro, object|callable $macro = null)
 * @method static void mixin(object $mixin, bool $replace = true)
 * @method static bool hasMacro(string $name)
 * @method static void flushMacros()
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
 *
 * @see \Illuminate\Auth\AuthManager
 * @see \Illuminate\Contracts\Auth\Factory
 * @see \Illuminate\Contracts\Auth\Guard
 * @see \Illuminate\Contracts\Auth\StatefulGuard
 */
class Auth extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'auth';
    }

    /**
     * Register the typical authentication routes for an application.
     *
     * @param  array  $options
     * @return void
     *
     * @throws \RuntimeException
     */
    public static function routes(array $options = [])
    {
        if (! static::$app->providerIsLoaded(UiServiceProvider::class)) {
            throw new RuntimeException('In order to use the Auth::routes() method, please install the laravel/ui package.');
        }

        static::$app->make('router')->auth($options);
    }
}
