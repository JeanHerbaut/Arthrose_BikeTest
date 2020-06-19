<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_company', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('city_id')->unsigned();
            $table->bigInteger('company_id')->unsigned();
            $table->unique(['company_id', 'city_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_company');
    }
}
