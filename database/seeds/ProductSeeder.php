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
        
        DB::table('products')->insert([
            'modelNumber' => '123450',
            'shortDesc' => 'Speedfox AMP Four',
            'longDesc' => '
                Fourche RockShox Pike RC S-Ped, amortisseur Fox Float DPS Perfomance Elite
                Transmission SRAM GX Eagle
                Roues DT Swiss HX 1501 Spline ONE 30',
            'image' => '/img/BMC-Speedfox-AMP-Four.png',
            'price' => 4999,
            'brand_id' => '1',
            'category_name' => 'E-VTT'
        ]);

        DB::table('products')->insert([
            'modelNumber' => '123451',
            'shortDesc' => 'Trailfox AMP SX Two',
            'longDesc' => '
                Fourche RockShox Pike RC S-Ped, amortisseur Fox Float DPS Perfomance Elite
                Transmission SRAM GX Eagle
                Roues DT Swiss HX 1501 Spline ONE 30',
            'image' => '/img/BMC_trailfox_amp_sx_two.png',
            'price' => 5499,
            'brand_id' => '1',
            'category_name' => 'E-VTT'
        ]);

        DB::table('products')->insert([
            'modelNumber' => '123452',
            'shortDesc' => 'Trailfox AMP ONE',
            'longDesc' => '
                Fourche RockShox Pike RC S-Ped, amortisseur Fox Float DPS Perfomance Elite
                Transmission SRAM GX Eagle
                Roues DT Swiss HX 1501 Spline ONE 30',
            'image' => '/img/BMC_trailfox_amp_one_.png',
            'price' => 6000,
            'brand_id' => '1',
            'category_name' => 'E-VTT'
        ]);

        DB::table('products')->insert([
            'modelNumber' => '123460',
            'shortDesc' => 'Addict SE disc',
            'longDesc' => '
                Cadre en carbone Addict Disc HMF
                Fourche Addict HMF
                Transmission Shimano Ultegra Di2 Disc, 22 vitesses
                Roues Syncros RP2.0 Disc
                Pneus Schwalbe ONE
                Composants carbone/aluminium Syncros',
            'image' => '/img/scott_1.png',
            'price' => 3799,
            'brand_id' => '2',
            'category_name' => 'Route'
        ]);

        DB::table('products')->insert([
            'modelNumber' => '123461',
            'shortDesc' => 'Axis eRIDE  Evo',
            'longDesc' => '      
                Cadre en aluminium Axis eRIDE EVO
                fourche SR Suntour XCR34 Air 130 mm
                X-Fusion Nude, Commande TwinLoc
                Shimano XT/SLX 12 vitesses
                Moteur Bosch Perf. CX, 625 Wh, PowerTube
                Freins à disque Shimano BR-MT520
                Porte-bagages Racktime 15 kg
                Pneux Schwalbe G-One Allround Perf.
                Béquille, composants Syncros
                Phare Supernova M99 mini, éclairage arrière',
            'image' => '/img/scott_ebike_1.png',
            'price' => 5799,
            'brand_id' => '2',
            'category_name' => 'E-route'
        ]);
        
    }
}
