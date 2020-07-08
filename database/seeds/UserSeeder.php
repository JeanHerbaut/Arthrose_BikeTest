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
            'email' => 'visiteur@gmail.com',
            'username' => 'JeanVisiteur',
            'password' => Hash::make('password')
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'email' => 'admin@gmail.com',
            'username' => 'JeanAdmin',
            'password' => Hash::make('password')
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'email' => 'exposant@gmail.com',
            'username' => 'JeanExposant',
            'password' => Hash::make('password'),
            'company_id' => 2
        ]);
        DB::table('users')->insert([
            'id' => 4,
            'email' => 'receptioniste@gmail.com',
            'username' => 'JeanReceptioniste',
            'password' => Hash::make('password')
        ]);
        DB::table('users')->insert([
            'id' => 5,
            'email' => 'rien@gmail.com',
            'username' => 'JeanRien',
            'password' => Hash::make('password')
        ]);
        DB::table('users')->insert([
            'id' => 6,
            'email' => 'AlbertSmith@gmail.com',
            'username' => 'albertsmith',
            'password' => Hash::make('password')
        ]);
    }
}
