<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigInteger('person_id')->unsigned();
            $table->foreign('person_id')
                ->references('id')
                ->on('people')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->primary('person_id');

            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->bigInteger('company_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropForeign(['person_id']);
        });
        Schema::dropIfExists('users');
    }
}
