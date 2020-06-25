<?php

use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->delete();
        DB::table('people')->insert([
            'name' => 'Visiteur',
            'firstname' => 'Jean'
        ]);
        DB::table('people')->insert([
            'name' => 'Admin',
            'firstname' => 'Jean'
        ]);
        DB::table('people')->insert([
            'name' => 'Exposant',
            'firstname' => 'Jean'
        ]);
        DB::table('people')->insert([
            'name' => 'Réceptioniste',
            'firstname' => 'Jean'
        ]);
    }
}
