<?php

namespace Tests\Helpers;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 20.08.2017
 * Time: 19:00
 */
trait DatabaseMigrationsWithSeeding
{
    use DatabaseMigrations {
        DatabaseMigrations::runDatabaseMigrations as parentRunDatabaseMigrations;
    }

    public function runDatabaseMigrations()
    {
        // overwriting only below command - added '--seed'
        $this->artisan('migrate');
        $this->artisan('db:seed');

        $this->app[Kernel::class]->setArtisan(null);

        $this->beforeApplicationDestroyed(function () {
            $this->artisan('migrate:reset');
        });
    }
}