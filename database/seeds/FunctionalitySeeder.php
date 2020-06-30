<?php

use Illuminate\Database\Seeder;

class FunctionalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('functionalities')->delete();
        DB::table('functionalities')->insert([
            'name' => 'viewMyTicket'
        ]);
        DB::table('functionalities')->insert([
            'name' => 'viewMyProfile'
        ]);
        DB::table('functionalities')->insert([
            'name' => 'viewMyProducts'
        ]);
        DB::table('functionalities')->insert([
            'name' => 'viewUsers'
        ]);
        DB::table('functionalities')->insert([
            'name' => 'viewTests'
        ]);
        DB::table('functionalities')->insert([
            'name' => 'manageUsers'
        ]);
        DB::table('functionalities')->insert([
            'name' => 'manageStaffs'
        ]);
        DB::table('functionalities')->insert([
            'name' => 'manageTests'
        ]);
        DB::table('functionalities')->insert([
            'name' => 'manageExhibitor'
        ]);
        DB::table('functionalities')->insert([
            'name' => 'manageProducts'
        ]);
    }
}
