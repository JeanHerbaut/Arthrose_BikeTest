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
        Schema::table('users', function($table) {
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('restrict')->onUpdate('restrict');
        });

        Schema::table('company_person', function ($table) {
            $table->foreign('company_id')->references('id')->on('companies')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('person_id')->references('id')->on('people')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('city_company', function ($table) {
            $table->foreign('city_id')->references('id')->on('cities')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('company_id')->references('id')->on('companies')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('test_schedule_user', function ($table) {
            $table->foreign('test_schedule_id')->references('id')->on('test_schedules')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('edition_staff', function ($table) {
            $table->foreign('edition_id')->references('id')->on('editions')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('staff_id')->references('person_id')->on('staffs')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('product_user', function ($table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('company_edition', function ($table) {
            $table->foreign('company_id')->references('id')->on('companies')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('edition_id')->references('id')->on('editions')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('edition_product', function ($table) {
            $table->foreign('edition_id')->references('id')->on('editions')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('role_user', function ($table) {
            $table->foreign('role_name')->references('name')->on('roles')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

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
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict')->onUpdate('restrict');
        });

        Schema::table('tests', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('test_schedule_id')->references('id')->on('test_schedules')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('bike_id')->references('id')->on('bikes')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id']);
        });
        Schema::table('company_person', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropForeign(['person_id']);
        });
        Schema::table('city_company', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropForeign(['city_id']);
        });
        Schema::table('test_schedule_user', function (Blueprint $table) {
            $table->dropForeign(['test_schedule_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::table('edition_staff', function (Blueprint $table) {
            $table->dropForeign(['edition_id']);
            $table->dropForeign(['staff_id']);
        });
        Schema::table('product_user', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::table('company_edition', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropForeign(['edition_id']);
        });
        
        Schema::table('edition_product', function (Blueprint $table) {
            $table->dropForeign(['edition_id']);
            $table->dropForeign(['product_id']);
        });
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
        Schema::table('role_user', function(Blueprint $table) {
            $table->dropForeign(['role_name', 'user_id']);
            }); 
            
    }
}
