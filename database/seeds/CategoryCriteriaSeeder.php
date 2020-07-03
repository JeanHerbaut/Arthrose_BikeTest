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
            'category_name' => 'eBike',
            'criteria_id' => '1'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'eBike',
            'criteria_id' => '2'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'eBike',
            'criteria_id' => '3'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'eBike',
            'criteria_id' => '5'
        ]);
    }
}
