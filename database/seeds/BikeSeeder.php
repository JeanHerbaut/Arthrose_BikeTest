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

        DB::table('bikes')->insert([
            'product_id' => 5,
            'size' => 'M',
            'distinctive_sign' => 'pneus à flancs blancs'
        ]);

        DB::table('bikes')->insert([
            'product_id' => 6,
            'size' => 'XL',
            'distinctive_sign' => ''
        ]);

        DB::table('bikes')->insert([
            'product_id' => 6,
            'size' => 'S',
            'distinctive_sign' => ''
        ]);

        DB::table('bikes')->insert([
            'product_id' => 6,
            'size' => 'L',
            'distinctive_sign' => ''
        ]);

        DB::table('bikes')->insert([
            'product_id' => 6,
            'size' => 'M',
            'distinctive_sign' => ''
        ]);

        DB::table('bikes')->insert([
            'product_id' => 7,
            'size' => 'M',
            'distinctive_sign' => 'num:34'
        ]);

        DB::table('bikes')->insert([
            'product_id' => 7,
            'size' => 'M',
            'distinctive_sign' => 'num:35'
        ]);

        DB::table('bikes')->insert([
            'product_id' => 7,
            'size' => 'L',
            'distinctive_sign' => 'num:36'
        ]);

        DB::table('bikes')->insert([
            'product_id' => 8,
            'size' => 'M',
            'distinctive_sign' => ''
        ]);

        DB::table('bikes')->insert([
            'product_id' => 8,
            'size' => 'M',
            'distinctive_sign' => ''
        ]);

        DB::table('bikes')->insert([
            'product_id' => 8,
            'size' => 'S',
            'distinctive_sign' => ''
        ]);

        DB::table('bikes')->insert([
            'product_id' => 8,
            'size' => 'S',
            'distinctive_sign' => ''
        ]);

        DB::table('bikes')->insert([
            'product_id' => 9,
            'size' => 'S',
            'distinctive_sign' => ''
        ]);

        DB::table('bikes')->insert([
            'product_id' => 9,
            'size' => 'M',
            'distinctive_sign' => ''
        ]);

        DB::table('bikes')->insert([
            'product_id' => 9,
            'size' => 'M',
            'distinctive_sign' => ''
        ]);

        DB::table('bikes')->insert([
            'product_id' => 9,
            'size' => 'L',
            'distinctive_sign' => ''
        ]);

        DB::table('bikes')->insert([
            'product_id' => 10,
            'size' => 'S',
            'distinctive_sign' => ''
        ]);

        DB::table('bikes')->insert([
            'product_id' => 10,
            'size' => 'M',
            'distinctive_sign' => ''
        ]);

        DB::table('bikes')->insert([
            'product_id' => 10,
            'size' => 'M',
            'distinctive_sign' => ''
        ]);

        DB::table('bikes')->insert([
            'product_id' => 10,
            'size' => 'L',
            'distinctive_sign' => ''
        ]);

        DB::table('bikes')->insert([
            'product_id' => 10,
            'size' => 'L',
            'distinctive_sign' => ''
        ]);
    }
}
