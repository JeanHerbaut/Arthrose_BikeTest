<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        DB::table('roles')->insert([
            'name' => 'visitor'
        ]);
        DB::table('roles')->insert([
            'name' => 'receptionist'
        ]);
        DB::table('roles')->insert([
            'name' => 'exhibitor'
        ]);
        DB::table('roles')->insert([
            'name' => 'admin'
        ]);
    }
}
