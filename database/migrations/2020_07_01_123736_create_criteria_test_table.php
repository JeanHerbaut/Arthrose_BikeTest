<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriteriaTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criteria_test', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('criteria_id')->unsigned();
            $table->bigInteger('test_id')->unsigned();
            $table->tinyInteger('note')->unsigned()->nullable();
            $table->unique(['criteria_id', 'test_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('criteria_test');
    }
}
