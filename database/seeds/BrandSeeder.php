<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->delete();
        DB::table('brands')->insert([
            'name' => 'BMC',
            'short_descr' => 'Super marque BMC',
            'company_id' => '1'
            ]);

        DB::table('brands')->insert([
            'name' => 'Scott',
            'short_descr' => 'Super marque Scott',
            'company_id' => '2'
            ]);
    }
}
