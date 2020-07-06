<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        DB::table('categories')->insert([
            'name' => 'VTT']);
        DB::table('categories')->insert([
            'name' => 'E-VTT']);
        DB::table('categories')->insert([
            'name' => 'Route']);
        DB::table('categories')->insert([
            'name' => 'E-route']);
        DB::table('categories')->insert([
            'name' => 'Gravel']);
    }
}
