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
            $table->string('criteria_name');
            $table->bigInteger('test_id')->unsigned();
            $table->tinyInteger('note')->unsigned();
            $table->unique(['criteria_name', 'test_id']);
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
