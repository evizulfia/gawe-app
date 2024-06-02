<?php

namespace Illuminate\Foundation\Support\Providers;

use Illuminate\Foundation\Events\DiscoverEvents;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [];

    /**
     * The subscribers to register.
     *
     * @var array
     */
    protected $subscribe = [];

    /**
     * The model observers to register.
     *
     * @var array
     */
    protected $observers = [];

    /**
<<<<<<< HEAD
=======
     * Indicates if events should be discovered.
     *
     * @var bool
     */
    protected static $shouldDiscoverEvents = true;

    /**
     * The configured event discovery paths.
     *
     * @var array|null
     */
    protected static $eventDiscoveryPaths;

    /**
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
     * Register the application's event listeners.
     *
     * @return void
     */
    public function register()
    {
        $this->booting(function () {
            $events = $this->getEvents();

            foreach ($events as $event => $listeners) {
                foreach (array_unique($listeners) as $listener) {
                    Event::listen($event, $listener);
                }
            }

            foreach ($this->subscribe as $subscriber) {
                Event::subscribe($subscriber);
            }

            foreach ($this->observers as $model => $observers) {
                $model::observe($observers);
            }
        });
    }

    /**
     * Boot any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Get the events and handlers.
     *
     * @return array
     */
    public function listens()
    {
        return $this->listen;
    }

    /**
     * Get the discovered events and listeners for the application.
     *
     * @return array
     */
    public function getEvents()
    {
        if ($this->app->eventsAreCached()) {
            $cache = require $this->app->getCachedEventsPath();

            return $cache[get_class($this)] ?? [];
        } else {
            return array_merge_recursive(
                $this->discoveredEvents(),
                $this->listens()
            );
        }
    }

    /**
     * Get the discovered events for the application.
     *
     * @return array
     */
    protected function discoveredEvents()
    {
        return $this->shouldDiscoverEvents()
                    ? $this->discoverEvents()
                    : [];
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
<<<<<<< HEAD
        return false;
=======
        return get_class($this) === __CLASS__ && static::$shouldDiscoverEvents === true;
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    }

    /**
     * Discover the events and listeners for the application.
     *
     * @return array
     */
    public function discoverEvents()
    {
        return collect($this->discoverEventsWithin())
                    ->reject(function ($directory) {
                        return ! is_dir($directory);
                    })
                    ->reduce(function ($discovered, $directory) {
                        return array_merge_recursive(
                            $discovered,
                            DiscoverEvents::within($directory, $this->eventDiscoveryBasePath())
                        );
                    }, []);
    }

    /**
     * Get the listener directories that should be used to discover events.
     *
     * @return array
     */
    protected function discoverEventsWithin()
    {
        return [
            $this->app->path('Listeners'),
        ];
    }

    /**
     * Get the base path to be used during event discovery.
     *
     * @return string
     */
    protected function eventDiscoveryBasePath()
    {
        return base_path();
    }
<<<<<<< HEAD
=======

    /**
     * Disable event discovery for the application.
     *
     * @return void
     */
    public static function disableEventDiscovery()
    {
        static::$shouldDiscoverEvents = false;
    }

    /**
     * Configure the proper event listeners for email verification.
     *
     * @return void
     */
    protected function configureEmailVerification()
    {
        if (! isset($this->listen[Registered::class]) ||
            ! in_array(SendEmailVerificationNotification::class, Arr::wrap($this->listen[Registered::class]))) {
            Event::listen(Registered::class, SendEmailVerificationNotification::class);
        }
    }
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
}
