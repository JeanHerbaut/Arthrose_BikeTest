<?php

use Illuminate\Database\Seeder;

class Functionality_Role_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('functionality_role')->delete();



        DB::table('functionality_role')->insert([
            'functionality_name' => 'viewMyTicket',
            'role_name' => 'visitor'
        ]);
        DB::table('functionality_role')->insert([
            'functionality_name' => 'viewMyBikes',
            'role_name' => 'visitor'
        ]);



        
        DB::table('functionality_role')->insert([
            'functionality_name' => 'manageTests',
            'role_name' => 'receptionist'
        ]);



        DB::table('functionality_role')->insert([
            'functionality_name' => 'manageProducts',
            'role_name' => 'exhibitor'
        ]);
        DB::table('functionality_role')->insert([
            'functionality_name' => 'manageTests',
            'role_name' => 'exhibitor'
        ]);



        DB::table('functionality_role')->insert([
            'functionality_name' => 'manageTests',
            'role_name' => 'admin'
        ]);
        DB::table('functionality_role')->insert([
            'functionality_name' => 'manageUsers',
            'role_name' => 'admin'
        ]);
    }
}
