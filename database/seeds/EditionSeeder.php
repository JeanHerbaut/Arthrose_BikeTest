<?php

use Illuminate\Database\Seeder;

class EditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('editions')->delete();
            DB::table('editions')->insert([
                'place' => 'Gryon',
                'startDate' => '2020-10-02',
                'endDate' => '2020-10-04',
                'event_id' => 2]);
    }
}
