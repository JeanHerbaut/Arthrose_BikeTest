<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->id();
            $table->string('street');
            $table->string('secondaryStreet')->nullable();
            $table->smallInteger('streetNumber')->unsigned();
            $table->string('poBox')->nullable();
            $table->bigInteger('city_id')->unsigned();
            $table->foreign('city_id')
                    ->references('id')
                    ->on('cities')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adresses', function(Blueprint $table) {
            $table->dropForeign('adresses_city_id_foreign');
        });
        Schema::dropIfExists('adresses');
    }
}
