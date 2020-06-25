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
                'shortDescr'=>'Une petite description',
                'longDescr'=>'UNNNNNNNNNNNEE GRAAAAAAAAAAAAAAANDE DESCRRRRRRRRRRRRRRRIPTION',
                'image'=>$date,
                'updated_at'=>$date
              ]);
        }
    }
}
