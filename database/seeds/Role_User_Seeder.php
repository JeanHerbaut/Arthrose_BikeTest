<?php

use Illuminate\Database\Seeder;

class Role_User_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->delete();
        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_name' => 'visitor'
        ]);
        DB::table('role_user')->insert([
            'user_id' => 2,
            'role_name' => 'admin'
        ]);
        DB::table('role_user')->insert([
            'user_id' => 3,
            'role_name' => 'exhibitor'
        ]);
        DB::table('role_user')->insert([
            'user_id' => 4,
            'role_name' => 'receptionist'
        ]);
    }
}
