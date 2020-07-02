<?php

use Illuminate\Database\Seeder;

class CriteriaTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 10; $i++) {
            DB::table('criteria_test')->insert([
                'test_id' => $i,
                'criteria_name' => 'Qualité/prix',
                'note' => rand(25, 80)
            ]);
            DB::table('criteria_test')->insert([
                'test_id' => $i,
                'criteria_name' => 'Poids',
                'note' => rand(25, 80)
            ]);
            DB::table('criteria_test')->insert([
                'test_id' => $i,
                'criteria_name' => 'Confort',
                'note' => rand(25, 80)
            ]);
            DB::table('criteria_test')->insert([
                'test_id' => $i,
                'criteria_name' => 'Freins',
                'note' => rand(25, 80)
            ]);
        }
        for ($i=11; $i < 20; $i++) {
            DB::table('criteria_test')->insert([
                'test_id' => $i,
                'criteria_name' => 'Qualité/prix',
                'note' => rand(25, 80)
            ]);
            DB::table('criteria_test')->insert([
                'test_id' => $i,
                'criteria_name' => 'Poids',
                'note' => rand(25, 80)
            ]);
            DB::table('criteria_test')->insert([
                'test_id' => $i,
                'criteria_name' => 'Confort',
                'note' => rand(25, 80)
            ]);
            DB::table('criteria_test')->insert([
                'test_id' => $i,
                'criteria_name' => 'Batterie',
                'note' => rand(25, 80)
            ]);
        }


        DB::table('criteria_test')->insert([
            'test_id' => 20,
            'criteria_name' => 'Qualité/prix',
            'note' => rand(25, 80)
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 20,
            'criteria_name' => 'Poids',
            'note' => rand(25, 80)
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 20,
            'criteria_name' => 'Confort',
            'note' => rand(25, 80)
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 20,
            'criteria_name' => 'Freins',
            'note' => rand(25, 80)
        ]);
    }
}
