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

        //ID 1
        DB::table('tests')->insert([
            'startTime' => '2020-10-02 11:00:00',
            'endTime' => '2020-10-02 11:30:00',
            'rating' => 4,
            'comment' => 'On reconnait tout de suite la qualité de fabrication de BMC. Cependant, la batterie n\'est pas encore vraiment au point.',
            'test_schedule_id' => 1,
            'product_id' => 1,
            'user_id' => 1,
            'bike_id' => 1
        ]);

        //ID 2
        DB::table('tests')->insert([
            'startTime' => '2020-10-02 13:00:00',
            'endTime' => '2020-10-02 14:00:00',
            'rating' => 5,
            'comment' => 'Ce vélo aurait été parfait si sa batterie avait eu une plus grande capacité. Mais il n\'a pas volé ses 5 étoiles',
            'test_schedule_id' => 2,
            'product_id' => 3,
            'user_id' => 1,
            'bike_id' => 4
        ]);

        //ID 3
        DB::table('tests')->insert([
            'startTime' => '2020-10-02 14:30:00',
            'endTime' => '2020-10-02 15:00:00',
            'test_schedule_id' => 2,
            'product_id' => 4,
            'user_id' => 1,
            'bike_id' => 7
        ]);

        //ID 4
        DB::table('tests')->insert([
            'startTime' => '2020-10-02 11:30:00',
            'endTime' => '2020-10-02 12:00:00',
            'rating' => 5,
            'comment' => 'Ce vélo est incroyable. Un peu cher mais on ne peut pas vraiment le lui reprocher vu la qualité!',
            'test_schedule_id' => 1,
            'product_id' => 1,
            'user_id' => 6,
            'bike_id' => 1
        ]);

        //ID 5
        DB::table('tests')->insert([
            'startTime' => '2020-10-02 14:00:00',
            'endTime' => '2020-10-02 14:30:00',
            'rating' => 4,
            'comment' => 'On aurait pu souhaiter des finitions un peu meilleures... finies. Mais pour le prix ce vélo est très bon.',
            'test_schedule_id' => 2,
            'product_id' => 4,
            'user_id' => 6,
            'bike_id' => 6
        ]);

        //ID 5
        DB::table('tests')->insert([
            'startTime' => '2020-10-02 14:30:00',
            'endTime' => '2020-10-02 15:00:00',
            'rating' => 3,
            'comment' => 'Vraiment pas convaincu. La tenue de route est pas terrible terrible',
            'test_schedule_id' => 2,
            'product_id' => 5,
            'user_id' => 6,
            'bike_id' => 8
        ]);
    }
}
