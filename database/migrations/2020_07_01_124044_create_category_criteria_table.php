<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_criteria', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('criteria_id')->unsigned();
            $table->string('category_name');
            $table->unique(['criteria_id', 'category_name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_criteria');
    }
}
