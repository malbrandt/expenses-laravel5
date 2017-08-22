<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('database.payments'), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expense_id');
            $table->float('amount');
            $table->tinyInteger('assent')
                ->nullable()
                ->comment = "-1 => rejected,\n" .
                            " 1 => accepted.";
            $table->timestamp('assent_modified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('database.payments'));
    }
}
