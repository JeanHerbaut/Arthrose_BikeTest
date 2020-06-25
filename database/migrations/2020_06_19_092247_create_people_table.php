<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->string('firstname', 64);
            $table->string('phoneNumber', 16)->nullable();
            $table->string('contact_email', 64)->nullable();
            $table->string('comment')->nullable();
            $table->bigInteger('adress_id')->unsigned()->nullable();
            $table->foreign('adress_id')
                    ->references('id')
                    ->on('adresses')
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
        Schema::table('people', function(Blueprint $table) {
            $table->dropForeign('people_adress_id_foreign');
        });
        Schema::dropIfExists('people');
    }
}
