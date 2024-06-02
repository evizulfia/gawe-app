<?php

namespace Illuminate\Support\Facades;

/**
 * @method static \Illuminate\Contracts\View\Factory addNamespace(string $namespace, string|array $hints)
 * @method static \Illuminate\Contracts\View\View first(array $views, \Illuminate\Contracts\Support\Arrayable|array $data = [], array $mergeData = [])
<<<<<<< HEAD
 * @method static \Illuminate\Contracts\View\Factory replaceNamespace(string $namespace, string|array $hints)
 * @method static \Illuminate\Contracts\View\Factory addExtension(string $extension, string $engine, \Closure|null $resolver = null)
 * @method static \Illuminate\Contracts\View\View file(string $path, array $data = [], array $mergeData = [])
 * @method static \Illuminate\Contracts\View\View make(string $view, array $data = [], array $mergeData = [])
=======
 * @method static string renderWhen(bool $condition, string $view, \Illuminate\Contracts\Support\Arrayable|array $data = [], array $mergeData = [])
 * @method static string renderUnless(bool $condition, string $view, \Illuminate\Contracts\Support\Arrayable|array $data = [], array $mergeData = [])
 * @method static string renderEach(string $view, array $data, string $iterator, string $empty = 'raw|')
 * @method static bool exists(string $view)
 * @method static \Illuminate\Contracts\View\Engine getEngineFromPath(string $path)
 * @method static mixed share(array|string $key, mixed|null $value = null)
 * @method static void incrementRender()
 * @method static void decrementRender()
 * @method static bool doneRendering()
 * @method static bool hasRenderedOnce(string $id)
 * @method static void markAsRenderedOnce(string $id)
 * @method static void addLocation(string $location)
 * @method static \Illuminate\View\Factory addNamespace(string $namespace, string|array $hints)
 * @method static \Illuminate\View\Factory prependNamespace(string $namespace, string|array $hints)
 * @method static \Illuminate\View\Factory replaceNamespace(string $namespace, string|array $hints)
 * @method static void addExtension(string $extension, string $engine, \Closure|null $resolver = null)
 * @method static void flushState()
 * @method static void flushStateIfDoneRendering()
 * @method static array getExtensions()
 * @method static \Illuminate\View\Engines\EngineResolver getEngineResolver()
 * @method static \Illuminate\View\ViewFinderInterface getFinder()
 * @method static void setFinder(\Illuminate\View\ViewFinderInterface $finder)
 * @method static void flushFinderCache()
 * @method static \Illuminate\Contracts\Events\Dispatcher getDispatcher()
 * @method static void setDispatcher(\Illuminate\Contracts\Events\Dispatcher $events)
 * @method static \Illuminate\Contracts\Container\Container getContainer()
 * @method static void setContainer(\Illuminate\Contracts\Container\Container $container)
 * @method static mixed shared(string $key, mixed $default = null)
 * @method static array getShared()
 * @method static void macro(string $name, object|callable $macro, object|callable $macro = null)
 * @method static void mixin(object $mixin, bool $replace = true)
 * @method static bool hasMacro(string $name)
 * @method static void flushMacros()
 * @method static void startComponent(\Illuminate\Contracts\View\View|\Illuminate\Contracts\Support\Htmlable|\Closure|string $view, array $data = [])
 * @method static void startComponentFirst(array $names, array $data = [])
 * @method static string renderComponent()
 * @method static mixed|null getConsumableComponentData(string $key, mixed $default = null)
 * @method static void slot(string $name, string|null $content = null, array $attributes = [])
 * @method static void endSlot()
 * @method static array creator(array|string $views, \Closure|string $callback)
 * @method static array composers(array $composers)
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
 * @method static array composer(array|string $views, \Closure|string $callback)
 * @method static array creator(array|string $views, \Closure|string $callback)
 * @method static bool exists(string $view)
 * @method static mixed share(array|string $key, $value = null)
 *
 * @see \Illuminate\View\Factory
 */
class View extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'view';
    }
}
