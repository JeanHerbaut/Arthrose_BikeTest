<?php

use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('criterias')->delete();
        DB::table('criterias')->insert(['name' => 'Qualité/prix']);
        DB::table('criterias')->insert(['name' => 'Poids']);
        DB::table('criterias')->insert(['name' => 'Confort']);
        DB::table('criterias')->insert(['name' => 'Composants']);
        DB::table('criterias')->insert(['name' => 'Batterie']);
        DB::table('criterias')->insert(['name' => 'Freins']);
    }
}
