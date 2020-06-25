<?php

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->delete();
        DB::table('groups')->insert([
            'name' => 'visitor'
        ]);
        DB::table('groups')->insert([
            'name' => 'receptionist'
        ]);
        DB::table('groups')->insert([
            'name' => 'exhibitor'
        ]);
        DB::table('groups')->insert([
            'name' => 'admin'
        ]);
    }
}
