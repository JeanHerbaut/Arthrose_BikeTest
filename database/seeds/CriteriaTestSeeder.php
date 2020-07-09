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
            'note' => 4
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 1,
            'criteria_id' => '2',
            'note' => 4
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 1,
            'criteria_id' => '3',
            'note' => 5
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 1,
            'criteria_id' => '5',
            'note' => 3
        ]);



        DB::table('criteria_test')->insert([
            'test_id' => 2,
            'criteria_id' => '1',
            'note' => 5
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 2,
            'criteria_id' => '2',
            'note' => 5
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 2,
            'criteria_id' => '3',
            'note' => 5
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 2,
            'criteria_id' => '5',
            'note' => 4
        ]);


        DB::table('criteria_test')->insert([
            'test_id' => 3,
            'criteria_id' => '1',
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 3,
            'criteria_id' => '2',
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 3,
            'criteria_id' => '3',
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 3,
            'criteria_id' => '6',
        ]);



        DB::table('criteria_test')->insert([
            'test_id' => 4,
            'criteria_id' => '1',
            'note' => 4
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 4,
            'criteria_id' => '2',
            'note' => 5
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 4,
            'criteria_id' => '3',
            'note' => 5
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 4,
            'criteria_id' => '5',
            'note' => 4
        ]);



        DB::table('criteria_test')->insert([
            'test_id' => 5,
            'criteria_id' => '1',
            'note' => 5
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 5,
            'criteria_id' => '2',
            'note' => 4
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 5,
            'criteria_id' => '3',
            'note' => 4
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 5,
            'criteria_id' => '6',
            'note' => 4
        ]);



        DB::table('criteria_test')->insert([
            'test_id' => 6,
            'criteria_id' => '1',
            'note' => 2
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 6,
            'criteria_id' => '2',
            'note' => 3
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 6,
            'criteria_id' => '3',
            'note' => 3
        ]);
        DB::table('criteria_test')->insert([
            'test_id' => 6,
            'criteria_id' => '5',
            'note' => 2
        ]);
    }
}
