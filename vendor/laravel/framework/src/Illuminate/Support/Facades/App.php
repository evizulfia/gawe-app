<?php

namespace Illuminate\Support\Facades;

/**
 * @method static \Illuminate\Contracts\Foundation\Application loadEnvironmentFrom(string $file)
 * @method static \Illuminate\Support\ServiceProvider register(\Illuminate\Support\ServiceProvider|string $provider, bool $force = false)
 * @method static \Illuminate\Support\ServiceProvider resolveProvider(string $provider)
 * @method static array getProviders(\Illuminate\Support\ServiceProvider|string $provider)
 * @method static mixed make($abstract, array $parameters = [])
 * @method static mixed makeWith($abstract, array $parameters = [])
 * @method static bool configurationIsCached()
 * @method static bool hasBeenBootstrapped()
 * @method static bool isDownForMaintenance()
 * @method static bool isLocal()
 * @method static bool isProduction()
 * @method static bool routesAreCached()
 * @method static bool runningInConsole()
 * @method static bool runningUnitTests()
 * @method static bool shouldSkipMiddleware()
 * @method static string basePath(string $path = '')
 * @method static string bootstrapPath(string $path = '')
 * @method static string configPath(string $path = '')
 * @method static string databasePath(string $path = '')
 * @method static string detectEnvironment(callable $callback)
 * @method static string environmentFile()
 * @method static string environmentFilePath()
 * @method static string environmentPath()
 * @method static string getCachedConfigPath()
 * @method static string getCachedPackagesPath()
 * @method static string getCachedRoutesPath()
 * @method static string getCachedServicesPath()
 * @method static string getLocale()
 * @method static string currentLocale()
 * @method static string getNamespace()
<<<<<<< HEAD
 * @method static string resourcePath(string $path = '')
 * @method static string storagePath(string $path = '')
 * @method static string version()
 * @method static string|bool environment(string|array ...$environments)
 * @method static never abort(int $code, string $message = '', array $headers = [])
 * @method static void boot()
 * @method static void booted(callable $callback)
 * @method static void booting(callable $callback)
 * @method static void bootstrapWith(array $bootstrappers)
 * @method static void loadDeferredProviders()
 * @method static void registerConfiguredProviders()
 * @method static void registerDeferredProvider(string $provider, string $service = null)
 * @method static void setLocale(string $locale)
 * @method static void terminate()
=======
 * @method static \Illuminate\Contracts\Container\ContextualBindingBuilder when(array|string $concrete)
 * @method static bool has(string $id)
 * @method static bool isShared(string $abstract)
 * @method static bool isAlias(string $name)
 * @method static void bind(string $abstract, \Closure|string|null $concrete = null, bool $shared = false)
 * @method static bool hasMethodBinding(string $method)
 * @method static void bindMethod(array|string $method, \Closure $callback)
 * @method static mixed callMethodBinding(string $method, mixed $instance)
 * @method static void addContextualBinding(string $concrete, string $abstract, \Closure|string $implementation)
 * @method static void bindIf(string $abstract, \Closure|string|null $concrete = null, bool $shared = false)
 * @method static void singleton(string $abstract, \Closure|string|null $concrete = null)
 * @method static void singletonIf(string $abstract, \Closure|string|null $concrete = null)
 * @method static void scoped(string $abstract, \Closure|string|null $concrete = null)
 * @method static void scopedIf(string $abstract, \Closure|string|null $concrete = null)
 * @method static void extend(string $abstract, \Closure $closure)
 * @method static mixed instance(string $abstract, mixed $instance)
 * @method static void tag(array|string $abstracts, array|mixed $tags)
 * @method static iterable tagged(string $tag)
 * @method static void alias(string $abstract, string $alias)
 * @method static mixed rebinding(string $abstract, \Closure $callback)
 * @method static mixed refresh(string $abstract, mixed $target, string $method)
 * @method static \Closure wrap(\Closure $callback, array $parameters = [])
 * @method static mixed call(callable|string $callback, array $parameters = [], string|null $defaultMethod = null)
 * @method static \Closure factory(string $abstract)
 * @method static mixed makeWith(string|callable $abstract, array $parameters = [])
 * @method static mixed get(string $id)
 * @method static mixed build(\Closure|string $concrete)
 * @method static void beforeResolving(\Closure|string $abstract, \Closure|null $callback = null)
 * @method static void resolving(\Closure|string $abstract, \Closure|null $callback = null)
 * @method static void afterResolving(\Closure|string $abstract, \Closure|null $callback = null)
 * @method static array getBindings()
 * @method static string getAlias(string $abstract)
 * @method static void forgetExtenders(string $abstract)
 * @method static void forgetInstance(string $abstract)
 * @method static void forgetInstances()
 * @method static void forgetScopedInstances()
 * @method static \Illuminate\Foundation\Application getInstance()
 * @method static \Illuminate\Contracts\Container\Container|\Illuminate\Foundation\Application setInstance(\Illuminate\Contracts\Container\Container|null $container = null)
 * @method static void macro(string $name, object|callable $macro, object|callable $macro = null)
 * @method static void mixin(object $mixin, bool $replace = true)
 * @method static bool hasMacro(string $name)
 * @method static void flushMacros()
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
 *
 * @see \Illuminate\Contracts\Foundation\Application
 */
class App extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'app';
    }
}
