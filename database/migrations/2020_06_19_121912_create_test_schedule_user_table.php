<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestScheduleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_schedule_user', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('test_schedule_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->unique(['test_schedule_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_schedule_user');
    }
}
