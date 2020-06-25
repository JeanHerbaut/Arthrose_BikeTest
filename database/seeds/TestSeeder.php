<?php

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tests')->delete();
        for ($i=1; $i < 20; $i++) { 
            DB::table('tests')->insert([
                'startTime' => '2020-10-02 11:00:00',
                'endTime' => '2020-10-02 13:00:00',
                'rating' => rand(1, 5),
                'test_schedule_id' => 1,
                'product_id' => $i,
                'user_id' => 1,
                'bike_id' => $i
            ]);
    
            DB::table('tests')->insert([
                'startTime' => '2020-10-02 15:00:00',
                'endTime' => '2020-10-02 17:00:00',
                'rating' => rand(1, 5),
                'test_schedule_id' => 2,
                'product_id' => $i,
                'user_id' => 1,
                'bike_id' => $i
            ]);
        }
    }
}
