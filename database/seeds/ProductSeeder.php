<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        for ($i=0; $i < 10; $i++) { 
            DB::table('products')->insert([
                'modelNumber'=>'1234567' . $i,
                'shortDesc'=>'Un vélo' . $i,
                'longDesc'=>'UNNNNNNNNNNNEE GRAAAAAAAAAAAAAAANDE DESCRRRRRRRRRRRRRRRIPTION',
                'image'=>'/img/bike.png',
                'price'=> rand(1, 3),
                'brand_id' => '2',
                'category_id' => rand(1, 2)
              ]);
        }

        for ($i=0; $i < 10; $i++) { 
            DB::table('products')->insert([
                'modelNumber'=>'7654321' . $i,
                'shortDesc'=>'Un autre vélo' . $i,
                'longDesc'=>'UNNNNNNNNNNNEE GRAAAAAAAAAAAAAAANDE DESCRRRRRRRRRRRRRRRIPTION',
                'image'=>'/img/bike.png',
                'price'=> rand(1, 3),
                'brand_id' => '1',
                'category_id' => rand(1, 2)
              ]);
        }
    }
}
