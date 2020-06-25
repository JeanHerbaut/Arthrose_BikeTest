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
        DB::table('products')->delete();
        DB::table('products')->insert([
            'name' => 'BMC',
            'short_descr' => 'Super marque BMC',
            'company_id' => '1'
            ]);
    }
}
