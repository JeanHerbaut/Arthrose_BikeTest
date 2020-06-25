<?php

use Illuminate\Database\Seeder;

class Functionality_Group_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('functionality_group')->delete();



        DB::table('functionality_group')->insert([
            'functionality_name' => 'viewMyTicket',
            'group_name' => 'visitor'
        ]);
        DB::table('functionality_group')->insert([
            'functionality_name' => 'viewMyBikes',
            'group_name' => 'visitor'
        ]);



        
        DB::table('functionality_group')->insert([
            'functionality_name' => 'manageTests',
            'group_name' => 'receptionist'
        ]);



        DB::table('functionality_group')->insert([
            'functionality_name' => 'manageBikes',
            'group_name' => 'exhibitor'
        ]);
        DB::table('functionality_group')->insert([
            'functionality_name' => 'manageTests',
            'group_name' => 'exhibitor'
        ]);



        DB::table('functionality_group')->insert([
            'functionality_name' => 'manageTests',
            'group_name' => 'admin'
        ]);
        DB::table('functionality_group')->insert([
            'functionality_name' => 'manageUsers',
            'group_name' => 'admin'
        ]);
    }
}
