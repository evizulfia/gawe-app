<?php

namespace Illuminate\Foundation\Testing;

trait LazilyRefreshDatabase
{
    use RefreshDatabase {
        refreshDatabase as baseRefreshDatabase;
    }

    /**
     * Define hooks to migrate the database before and after each test.
     *
     * @return void
     */
    public function refreshDatabase()
    {
        $database = $this->app->make('db');

        $database->beforeExecuting(function () {
            if (RefreshDatabaseState::$lazilyRefreshed) {
                return;
            }

            RefreshDatabaseState::$lazilyRefreshed = true;

<<<<<<< HEAD
            $this->baseRefreshDatabase();
        });
=======
            if (property_exists($this, 'mockConsoleOutput')) {
                $shouldMockOutput = $this->mockConsoleOutput;

                $this->mockConsoleOutput = false;
            }

            $this->baseRefreshDatabase();

            if (property_exists($this, 'mockConsoleOutput')) {
                $this->mockConsoleOutput = $shouldMockOutput;
            }
        };

        $database->beforeStartingTransaction($callback);
        $database->beforeExecuting($callback);
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec

        $this->beforeApplicationDestroyed(function () {
            RefreshDatabaseState::$lazilyRefreshed = false;
        });
    }
}
