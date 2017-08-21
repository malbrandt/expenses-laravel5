<?php

namespace Tests\Feature;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
use Tests\Helpers\DatabaseMigrationsWithSeeding;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DatabaseSeedingTest extends TestCase
{
    use DatabaseTransactions;
    use DatabaseMigrationsWithSeeding;

    /**
     * Test number of generated items with corresponding config values in
     * config/database.php
     *
     * @return void
     */
    public function testSeedingsCounts()
    {
        $seeding_counts = config('database.seeding_count');
//        $this->artisan('db:seed');

        foreach ($seeding_counts as $table_name => $seeding_count) {
            if ($table_name == 'users') {
                $seeding_count += 1; // add +1 for admin account
            }

            self::assertEquals($seeding_count, DB::table($table_name)->count());
        }
    }
}
