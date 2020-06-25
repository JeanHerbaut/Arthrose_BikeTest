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
            $table->string('functionality_name');
            $table->string('group_name');
            $table->unique(['functionality_name', 'group_name']);
            $table->foreign('functionality_name')->references('name')->on('functionalities')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
            $table->foreign('group_name')->references('name')->on('groups')
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
