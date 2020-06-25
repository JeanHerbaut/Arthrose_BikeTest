<?php

use Illuminate\Database\Seeder;

class Group_User_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_user')->delete();
        DB::table('group_user')->insert([
            'user_id' => 1,
            'group_name' => 'visitor'
        ]);
        DB::table('group_user')->insert([
            'user_id' => 2,
            'group_name' => 'admin'
        ]);
        DB::table('group_user')->insert([
            'user_id' => 3,
            'group_name' => 'exhibitor'
        ]);
        DB::table('group_user')->insert([
            'user_id' => 3,
            'group_name' => 'receptionist'
        ]);
    }
}
