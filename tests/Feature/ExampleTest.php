<?php

namespace Tests\Feature;

use Illuminate\Routing\Route;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/expenses');

        $route_is_expenses = Route::is('/expenses');

        $response->assertStatus(200);
    }
}
