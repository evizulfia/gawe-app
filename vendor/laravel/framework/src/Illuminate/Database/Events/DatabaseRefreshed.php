<?php

namespace Illuminate\Database\Events;

use Illuminate\Contracts\Database\Events\MigrationEvent as MigrationEventContract;

class DatabaseRefreshed implements MigrationEventContract
{
<<<<<<< HEAD
    //
=======
    /**
     * Create a new event instance.
     *
     * @param  string|null  $database
     * @param  bool  $seeding
     * @return void
     */
    public function __construct(
        public ?string $database = null,
        public bool $seeding = false
    ) {
        //
    }
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
}
