<?php

use Illuminate\Database\Seeder;

class TestScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('test_schedules')->delete();
        DB::table('test_schedules')->insert([
            'startTime' => '2020-10-02 10:00:00',
            'endTime' => '2020-10-02 14:00:00',
            'edition_id' => 6
        ]);
        DB::table('test_schedules')->insert([
            'startTime' => '2020-10-02 14:00:00',
            'endTime' => '2020-10-02 18:00:00',
            'edition_id' => 6
        ]);
        DB::table('test_schedules')->insert([
            'startTime' => '2020-10-03 10:00:00',
            'endTime' => '2020-10-03 14:00:00',
            'edition_id' => 6
        ]);
        DB::table('test_schedules')->insert([
            'startTime' => '2020-10-03 14:00:00',
            'endTime' => '2020-10-03 18:00:00',
            'edition_id' => 6
        ]);
        DB::table('test_schedules')->insert([
            'startTime' => '2020-10-04 10:00:00',
            'endTime' => '2020-10-04 14:00:00',
            'edition_id' => 6
        ]);
        DB::table('test_schedules')->insert([
            'startTime' => '2020-10-04 14:00:00',
            'endTime' => '2020-10-04 18:00:00',
            'edition_id' => 6
        ]);
    }
}
