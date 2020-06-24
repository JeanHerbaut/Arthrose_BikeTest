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
            'test_schedule_id' => '4',
            'user_id' => '1'
        ]);
        DB::table('test_schedule_user')->insert([
            'test_schedule_id' => '6',
            'user_id' => '1'
        ]);
        DB::table('test_schedule_user')->insert([
            'test_schedule_id' => '9',
            'user_id' => '1'
        ]);
        DB::table('test_schedule_user')->insert([
            'test_schedule_id' => '4',
            'user_id' => '2'
        ]);
        DB::table('test_schedule_user')->insert([
            'test_schedule_id' => '5',
            'user_id' => '2'
        ]);
        DB::table('test_schedule_user')->insert([
            'test_schedule_id' => '8',
            'user_id' => '2'
        ]);
    }
}
