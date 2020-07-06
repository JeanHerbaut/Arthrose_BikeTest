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

        DB::table('criteria_test')->insert([
            'test_id' => 1,
            'criteria_id' => '1',
            'note' => rand(1, 5)
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 1,
            'criteria_id' => '2',
            'note' => rand(1, 5)
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 1,
            'criteria_id' => '3',
            'note' => rand(1, 5)
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 1,
            'criteria_id' => '5',
            'note' => rand(1, 5)
        ]);
    }
}
