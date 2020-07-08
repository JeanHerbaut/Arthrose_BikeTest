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
        /*id 1*/
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
        /*id 2*/
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
        /*id 3*/
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
        /*id 4*/
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
        /*id 5*/
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
        /*id 6*/
        DB::table('products')->insert([
            'modelNumber' => '123462',
            'shortDesc' => 'Spark 970',
            'longDesc' => '      
                Le VTT tout suspendu SCOTT SPARK 970 de 2018 
                est le modèle premier prix fait pour le Cross-Country 
                et les distances marathon, avec un cadre aluminium ultra-léger. 
                Equipé de roues de 29", d\'une transmission Shimano Deore 2x10V, 
                il conviendra aux sportifs à la recherche de performance et de confort.',
            'image' => '/img/scott_2.png',
            'price' => '1699',
            'brand_id' => '2',
            'category_name' => 'VTT'
        ]);
        /*id 7*/
        DB::table('products')->insert([
            'modelNumber' => '123463',
            'shortDesc' => 'Genius 900 Tuned',
            'longDesc' => '      
                Le Genius constitue un modèle incontournable de notre gamme 
                de VTT depuis maintenant de nombreuses années. Résultat d\'une attention 
                particulière portée à l\'innovation, à la technologie et au design, 
                le Genius a évolué au fil des années afin de pouvoir dompter tous les 
                obstacles sur son chemin.',
            'image' => '/img/scott_3.png',
            'price' => '6800',
            'brand_id' => '2',
            'category_name' => 'VTT'
        ]);
        /*id 8*/
        DB::table('products')->insert([
            'modelNumber' => '123464',
            'shortDesc' => 'CONTESSA SPARK RC 900',
            'longDesc' => '      
                Le vélo tout-suspendu Contessa Spark RC 900 est voué à 
                devenir le roi du cross-country. Avec sa fourche RockShox 
                SID Select +, associée à un amortisseur arrière RockShox NUDE 
                pouvant être réglé sur 3 modes différents grâce au système de 
                suspension TwinLoc, roulez l’esprit tranquille.',
            'image' => '/img/scott_4.png',
            'price' => '6999',
            'brand_id' => '2',
            'category_name' => 'VTT'
        ]);
        /*id 9*/
        DB::table('products')->insert([
            'modelNumber' => '123465',
            'shortDesc' => 'ASPECT eRIDE  930',
            'longDesc' => '      
                Le SCOTT Aspect eRIDE 930 dispose d’une technologie d’assistance 
                électrique éprouvée le tout intégré dans un package confortable, 
                pour des heures de VTT sur vos sentiers favoris Doté d’une batterie 
                intégrée et assisté par un moteur Bosch de 500 Wh, l’Aspect eRIDE 
                vous permettra de rouler pendant des heures.',
            'image' => '/img/scott_ebike_2.png',
            'price' => '3499',
            'brand_id' => '2',
            'category_name' => 'E-VTT'
        ]);
        /*id 10*/
        DB::table('products')->insert([
            'modelNumber' => '123466',
            'shortDesc' => 'STRIKE eRIDE  910',
            'longDesc' => '      
                Avec son tout nouveau design, le Strike eRIDE 910 est la référence 
                en matière de confort pour les VTTAE tout-suspendus. Une intégration 
                de pointe, des composants haut de gamme et le tout nouveau système d’assistance 
                électrique Bosch s’associent pour vous offrir un vélo solide adapté à 
                tous types de sorties',
            'image' => '/img/scott_ebike_3.png',
            'price' => '6399',
            'brand_id' => '2',
            'category_name' => 'E-VTT'
        ]);
    }
}
