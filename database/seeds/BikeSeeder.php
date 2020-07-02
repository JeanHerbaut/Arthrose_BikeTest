
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
        for ($i=1; $i < 200; $i++) {
            DB::table('bikes')->insert([
                'product_id' => $i%20+1,
                'size' => 'M',
                'distinctive_sign' => 'signe'.$i
                ]);
        }
    }
}
