<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DatabaseSeedingTest extends TestCase
{
    use DatabaseMigrations {
        runDatabaseMigrations as baseRunDatabaseMigrations;
    }
    use DatabaseTransactions;

    /**
     * Define hooks to migrate the database before and after each test.
     *
     * @return void
     */
    public function runDatabaseMigrations()
    {
        $this->baseRunDatabaseMigrations();
        $this->artisan('db:seed');
    }

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
            self::assertEquals($seeding_count, DB::table($table_name)->count());
        }
    }
}
