<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('zip')->unsigned();
            $table->string('name');
            $table->string('state')->nullable();
            $table->bigInteger('country_id')->unsigned();
            $table->foreign('country_id')
                    ->references('id')
                    ->on('countries')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
            $table->unique(['zip', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cities', function(Blueprint $table) {
            $table->dropForeign('cities_country_id_foreign');
        });
        Schema::dropIfExists('cities');
    }
}
