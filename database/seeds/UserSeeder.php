<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
            DB::table('users')->insert([
                'id' => 1,
                //'name' => 'John',
                'email' => 'johnsmith@gmail.com',
                'username' => 'johnny',
                'password' => Hash::make('password')]);
    }
}
