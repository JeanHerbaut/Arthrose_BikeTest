<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->dateTime('startTime');
            $table->dateTime('endTime')->nullable();
            $table->tinyInteger('rating')->nullable();
            $table->integer('likes')->default(0);
            $table->text('comments')->nullable();
            $table->bigInteger('test_schedule_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('bike_id')->unsigned();
            $table->unique(['user_id', 'product_id', 'startTime']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests');
    }
}
