<?php

use Illuminate\Database\Seeder;

class TestScheduleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('test_schedule_user')->delete();
        DB::table('test_schedule_user')->insert([
            'test_schedule_id' => '3',
            'user_id' => '1'
        ]);
        DB::table('test_schedule_user')->insert([
            'test_schedule_id' => '1',
            'user_id' => '6'
        ]);
    }
}
