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
        for ($i=1; $i < 20; $i++) { 
            DB::table('bikes')->insert([
                'product_id' => $i,
                'size' => 'M',
                'distinctive_sign' => 'signe'.$i
                ]);
        }
        
    }
}
