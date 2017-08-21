<?php

namespace Tests\Feature;

use App\Expense;
use App\Payment;
use App\User;
use Tests\Helpers\DatabaseMigrationsWithSeeding;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserExpensesPaymentsRelationsTest extends TestCase
{
    use DatabaseMigrationsWithSeeding;
    use DatabaseTransactions;

    private $expenses;
    private $payments;
    private $user;

    protected function setUp()
    {
        parent::setUp();

        // Make some user
        $this->user = factory(User::class)->create();

        // Assing some expenses to him
        $this->expenses = $this->user->expenses()
            ->saveMany(factory(Expense::class, 2)->make());

        // Assing payments to expenses
        foreach ($this->expenses as $expense) {
            $this->payments = $expense->payments()
                ->saveMany(factory(Payment::class, 2)->make());
        }
    }

    /**
     * Test whether the user can own expenses
     *
     * @return void
     */
    public function testUserExpensesRelation()
    {
        // Test relation
        foreach ($this->expenses->toArray() as $expense) {
            $this->assertDatabaseHas(
                config('database.expenses'),
                $expense
            );
            $this->assertEquals($this->user->id, $expense['user_id']);
        }
    }

    /**
     * Test whether the expenses can have associated payments
     *
     * @return void
     */
    public function testExpensePaymentsRelation()
    {
        $expense_ids = $this->expenses->pluck('id')->toArray();

        foreach ($this->payments->toArray() as $payment) {
            $this->assertDatabaseHas(
                config('database.payments'),
                $payment
            );
            self::assertContains($payment['expense_id'], $expense_ids);
        }
    }
}
