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
                'criteria_id' => '1',
                'note' => rand(1, 5)
            ]);
            DB::table('criteria_test')->insert([
                'test_id' => $i,
                'criteria_id' => '2',
                'note' => rand(1, 5)
            ]);
            DB::table('criteria_test')->insert([
                'test_id' => $i,
                'criteria_id' => '3',
                'note' => rand(1, 5)
            ]);
            DB::table('criteria_test')->insert([
                'test_id' => $i,
                'criteria_id' => '6',
                'note' => rand(1, 5)
            ]);
        }
        for ($i=11; $i < 20; $i++) {
            DB::table('criteria_test')->insert([
                'test_id' => $i,
                'criteria_id' => '1',
                'note' => rand(1, 5)
            ]);
            DB::table('criteria_test')->insert([
                'test_id' => $i,
                'criteria_id' => '2',
                'note' => rand(1, 5)
            ]);
            DB::table('criteria_test')->insert([
                'test_id' => $i,
                'criteria_id' => '3',
                'note' => rand(1, 5)
            ]);
            DB::table('criteria_test')->insert([
                'test_id' => $i,
                'criteria_id' => '5',
                'note' => rand(1, 5)
            ]);
        }


        DB::table('criteria_test')->insert([
            'test_id' => 20,
            'criteria_id' => '1',
            'note' => rand(1, 5)
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 20,
            'criteria_id' => '2',
            'note' => rand(1, 5)
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 20,
            'criteria_id' => '3',
            'note' => rand(1, 5)
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 20,
            'criteria_id' => '6',
            'note' => rand(1, 5)
        ]);
    }
}
