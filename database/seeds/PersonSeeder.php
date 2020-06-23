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
                'name' => 'Smith',
                'firstname' => 'John']);
    }
}
