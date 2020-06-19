<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFunctionalityGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('functionality_group', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('functionality_id')->unsigned();
            $table->bigInteger('group_id')->unsigned();
            $table->unique(['functionality_id', 'group_id']);
            $table->foreign('functionality_id')->references('id')->on('functionalities')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
            $table->foreign('group_id')->references('id')->on('groups')
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
        Schema::table('functionality_group', function(Blueprint $table) {
            $table->dropForeign(['functionality_id']);
            $table->dropForeign(['group_id']);
         });
        Schema::dropIfExists('functionality_group');
    }
}
