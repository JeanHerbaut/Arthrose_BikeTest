<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditionStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edition_staff', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('edition_id')->unsigned();
            $table->bigInteger('staff_id')->unsigned();
            $table->unique(['edition_id', 'staff_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edition_staff');
    }
}
