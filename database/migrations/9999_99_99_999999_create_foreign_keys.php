<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('editions', function($table) {
            $table->foreign('event_id')->references('id')->on('events')->onDelete('restrict')->onUpdate('restrict');
        });

        Schema::table('test_schedules', function($table) {
            $table->foreign('edition_id')->references('id')->on('editions')->onDelete('restrict')->onUpdate('restrict');
        });

        Schema::table('brands', function($table) {
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('restrict')->onUpdate('restrict');
        });

        Schema::table('products', function($table) {
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('restrict')->onUpdate('restrict');
        });

        Schema::table('tests', function($table) {
            $table->foreign('user_id')->references('person_id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('test_schedule_id')->references('id')->on('test_schedules')->onDelete('restrict')->onUpdate('restrict');
        });

        Schema::table('bikes', function($table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict')->onUpdate('restrict');
        });

        Schema::table('vtts', function($table) {
            $table->foreign('bike_id')->references('product_id')->on('bikes')->onDelete('restrict')->onUpdate('restrict');
        });

        Schema::table('e_bikes', function($table) {
            $table->foreign('bike_id')->references('product_id')->on('bikes')->onDelete('restrict')->onUpdate('restrict');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('editions', function(Blueprint $table) {
            $table->dropForeign(['event_id']);
            });
            
        Schema::table('test_schedules', function(Blueprint $table) {
            $table->dropForeign(['edition_id']);
            });

        Schema::table('brands', function(Blueprint $table) {
            $table->dropForeign(['company_id']);
            });

        Schema::table('products', function(Blueprint $table) {
            $table->dropForeign(['brand_id']);
            });   

        Schema::table('products', function(Blueprint $table) {
            $table->dropForeign(['user_id', 'product_id', 'test_schedule_id']);
            });   
            
    }
}
