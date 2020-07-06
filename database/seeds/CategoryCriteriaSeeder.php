<?php

use Illuminate\Database\Seeder;

class CategoryCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_criteria')->delete();
        DB::table('category_criteria')->insert([
            'category_name' => 'VTT',
            'criteria_id' => '1'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'VTT',
            'criteria_id' => '2'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'VTT',
            'criteria_id' => '3'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'VTT',
            'criteria_id' => '6'
        ]);


        DB::table('category_criteria')->insert([
            'category_name' => 'Route',
            'criteria_id' => '1'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'Route',
            'criteria_id' => '2'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'Route',
            'criteria_id' => '3'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'Route',
            'criteria_id' => '6'
        ]);


        DB::table('category_criteria')->insert([
            'category_name' => 'Gravel',
            'criteria_id' => '1'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'Gravel',
            'criteria_id' => '2'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'Gravel',
            'criteria_id' => '3'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'Gravel',
            'criteria_id' => '6'
        ]);


        DB::table('category_criteria')->insert([
            'category_name' => 'E-VTT',
            'criteria_id' => '1'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'E-VTT',
            'criteria_id' => '2'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'E-VTT',
            'criteria_id' => '3'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'E-VTT',
            'criteria_id' => '5'
        ]);

        
        DB::table('category_criteria')->insert([
            'category_name' => 'E-route',
            'criteria_id' => '1'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'E-route',
            'criteria_id' => '2'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'E-route',
            'criteria_id' => '3'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'E-route',
            'criteria_id' => '5'
        ]);
    }
}
