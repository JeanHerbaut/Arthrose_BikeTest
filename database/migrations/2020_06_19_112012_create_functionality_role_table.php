<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFunctionalityRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('functionality_role', function (Blueprint $table) {
            $table->id();
            $table->string('functionality_name');
            $table->string('role_name');
            $table->unique(['functionality_name', 'role_name']);
            $table->foreign('functionality_name')->references('name')->on('functionalities')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
            $table->foreign('role_name')->references('name')->on('roles')
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
        Schema::table('functionality_role', function(Blueprint $table) {
            $table->dropForeign(['functionality_id']);
            $table->dropForeign(['role_id']);
         });
        Schema::dropIfExists('functionality_role');
    }
}
