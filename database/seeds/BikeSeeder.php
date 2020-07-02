<?php

use Illuminate\Database\Seeder;

class BikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bikes')->delete();
        for ($i = 1; $i < 200; $i++) {
            DB::table('bikes')->insert([
                'product_id' => $i % 20 + 1,
                'size' => 'M',
<<<<<<< HEAD
                'distinctive_sign' => 'signe'.$i
                ]);
=======
                'distinctive_sign' => 'signe' . $i
            ]);
>>>>>>> 47dc9e33064f9a22162bb3192805e8bbd6954054
        }
    }
}
