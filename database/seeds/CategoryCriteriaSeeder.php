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
            'criteria_name' => 'Qualité/prix'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'VTT',
            'criteria_name' => 'Poids'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'VTT',
            'criteria_name' => 'Confort'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'VTT',
            'criteria_name' => 'Freins'
        ]);


        DB::table('category_criteria')->insert([
            'category_name' => 'eBike',
            'criteria_name' => 'Qualité/prix'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'eBike',
            'criteria_name' => 'Poids'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'eBike',
            'criteria_name' => 'Confort'
        ]);
        DB::table('category_criteria')->insert([
            'category_name' => 'eBike',
            'criteria_name' => 'Batterie'
        ]);
    }
}
