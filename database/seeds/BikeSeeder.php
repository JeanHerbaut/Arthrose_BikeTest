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
        DB::table('bikes')->insert([
            'product_id' => 1,
            'size' => 'M',
            'distinctive_sign' => 'cadre rouge'
        ]);
        DB::table('bikes')->insert([
            'product_id' => 1,
            'size' => 'M',
            'distinctive_sign' => 'cadre bleu'
        ]);

        DB::table('bikes')->insert([
            'product_id' => 2,
            'size' => 'L',
            'distinctive_sign' => 'scotch blanc sous la selle'
        ]);

        DB::table('bikes')->insert([
            'product_id' => 3,
            'size' => 'L',
            'distinctive_sign' => 'scotch blanc sous la selle'
        ]);

        DB::table('bikes')->insert([
            'product_id' => 3,
            'size' => 'XL',
            'distinctive_sign' => 'scotch rouge sous la selle'
        ]);

        DB::table('bikes')->insert([
            'product_id' => 4,
            'size' => 'L',
            'distinctive_sign' => ''
        ]);

        DB::table('bikes')->insert([
            'product_id' => 4,
            'size' => 'M',
            'distinctive_sign' => ''
        ]);

        DB::table('bikes')->insert([
            'product_id' => 5,
            'size' => 'M',
            'distinctive_sign' => 'pneus à flancs blancs'
        ]);
    }
}
