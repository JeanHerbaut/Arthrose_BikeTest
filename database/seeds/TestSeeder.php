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
        DB::table('tests')->insert([
            'startTime' => '2020-10-02 16:00:00',
            'endTime' => '2020-10-02 16:30:00',
            'rating' => 4,
            'test_schedule_id' => 2,
            'product_id' => 1,
            'user_id' => 2,
            'bike_id' => 1
        ]);
    }
}
