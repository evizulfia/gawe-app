<?php

namespace Illuminate\Foundation\Providers;

<<<<<<< HEAD
use Illuminate\Contracts\Foundation\MaintenanceMode as MaintenanceModeContract;
=======
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Contracts\Console\Kernel as ConsoleKernel;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Foundation\MaintenanceMode as MaintenanceModeContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Grammar;
use Illuminate\Foundation\Console\CliDumper;
use Illuminate\Foundation\Exceptions\Renderer\Listener;
use Illuminate\Foundation\Exceptions\Renderer\Mappers\BladeMapper;
use Illuminate\Foundation\Exceptions\Renderer\Renderer;
use Illuminate\Foundation\Http\HtmlDumper;
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
use Illuminate\Foundation\MaintenanceModeManager;
use Illuminate\Http\Request;
use Illuminate\Log\Events\MessageLogged;
use Illuminate\Support\AggregateServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Testing\LoggedExceptionCollection;
use Illuminate\Testing\ParallelTestingServiceProvider;
use Illuminate\Validation\ValidationException;
<<<<<<< HEAD
=======
use Symfony\Component\ErrorHandler\ErrorRenderer\HtmlErrorRenderer;
use Symfony\Component\VarDumper\Caster\StubCaster;
use Symfony\Component\VarDumper\Cloner\AbstractCloner;
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec

class FoundationServiceProvider extends AggregateServiceProvider
{
    /**
     * The provider class names.
     *
     * @var string[]
     */
    protected $providers = [
        FormRequestServiceProvider::class,
        ParallelTestingServiceProvider::class,
    ];

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../Exceptions/views' => $this->app->resourcePath('views/errors/'),
            ], 'laravel-errors');
        }

        if ($this->app->hasDebugModeEnabled()) {
            $this->app->make(Listener::class)->registerListeners(
                $this->app->make(Dispatcher::class)
            );
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        parent::register();

        $this->registerRequestValidation();
        $this->registerRequestSignatureValidation();
        $this->registerExceptionTracking();
        $this->registerExceptionRenderer();
        $this->registerMaintenanceModeManager();
    }

    /**
     * Register the "validate" macro on the request.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function registerRequestValidation()
    {
        Request::macro('validate', function (array $rules, ...$params) {
            return validator()->validate($this->all(), $rules, ...$params);
        });

        Request::macro('validateWithBag', function (string $errorBag, array $rules, ...$params) {
            try {
                return $this->validate($rules, ...$params);
            } catch (ValidationException $e) {
                $e->errorBag = $errorBag;

                throw $e;
            }
        });
    }

    /**
     * Register the "hasValidSignature" macro on the request.
     *
     * @return void
     */
    public function registerRequestSignatureValidation()
    {
        Request::macro('hasValidSignature', function ($absolute = true) {
            return URL::hasValidSignature($this, $absolute);
        });

        Request::macro('hasValidRelativeSignature', function () {
            return URL::hasValidSignature($this, $absolute = false);
        });

        Request::macro('hasValidSignatureWhileIgnoring', function ($ignoreQuery = [], $absolute = true) {
            return URL::hasValidSignature($this, $absolute, $ignoreQuery);
        });
    }

    /**
     * Register an event listener to track logged exceptions.
     *
     * @return void
     */
    protected function registerExceptionTracking()
    {
        if (! $this->app->runningUnitTests()) {
            return;
        }

        $this->app->instance(
            LoggedExceptionCollection::class,
            new LoggedExceptionCollection
        );

        $this->app->make('events')->listen(MessageLogged::class, function ($event) {
            if (isset($event->context['exception'])) {
                $this->app->make(LoggedExceptionCollection::class)
                        ->push($event->context['exception']);
            }
        });
    }

    /**
     * Register the exceptions renderer.
     *
     * @return void
     */
    protected function registerExceptionRenderer()
    {
        if (! $this->app->hasDebugModeEnabled()) {
            return;
        }

        $this->loadViewsFrom(__DIR__.'/../resources/exceptions/renderer', 'laravel-exceptions-renderer');

        $this->app->singleton(Renderer::class, function (Application $app) {
            $errorRenderer = new HtmlErrorRenderer(
                $app['config']->get('app.debug'),
            );

            return new Renderer(
                $app->make(Factory::class),
                $app->make(Listener::class),
                $errorRenderer,
                $app->make(BladeMapper::class),
                $app->basePath(),
            );
        });

        $this->app->singleton(Listener::class);
    }

    /**
     * Register the maintenance mode manager service.
     *
     * @return void
     */
    public function registerMaintenanceModeManager()
    {
        $this->app->singleton(MaintenanceModeManager::class);

        $this->app->bind(
            MaintenanceModeContract::class,
            fn () => $this->app->make(MaintenanceModeManager::class)->driver()
        );
    }
}
