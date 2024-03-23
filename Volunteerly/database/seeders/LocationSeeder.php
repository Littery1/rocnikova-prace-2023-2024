<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location; // Import the Location model
use Illuminate\Support\Facades\DB; // Import the DB class

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [

            [
                'city' => 'Ostrava',
                'province' => 'Moravská Ostrava a Přívoz',
                'street' => 'Masarykovo náměstí',
                'coordinates' => DB::raw('POINT(49.8346, 18.2922)'),
            ],
            [
                'city' => 'Plzeň',
                'province' => 'Plzeň 3',
                'street' => 'Náměstí Republiky',
                'coordinates' => DB::raw('POINT(49.7475, 13.3776)'),
            ],
            [
                'city' => 'Liberec',
                'province' => 'Liberec 1',
                'street' => 'náměstí Dr. E. Beneše',
                'coordinates' => DB::raw('POINT(50.7671, 15.0566)'),
            ],
            [
                'city' => 'České Budějovice',
                'province' => 'České Budějovice 1',
                'street' => 'náměstí Přemysla Otakara II.',
                'coordinates' => DB::raw('POINT(48.9744, 14.4746)'),
            ],
            [
                'city' => 'Hradec Králové',
                'province' => 'Hradec Králové',
                'street' => 'Velké náměstí',
                'coordinates' => DB::raw('POINT(50.2094, 15.8328)'),
            ],
            [
                'city' => 'Ústí nad Labem',
                'province' => 'Ústí nad Labem-město',
                'street' => 'Mírové náměstí',
                'coordinates' => DB::raw('POINT(50.6607, 14.0320)'),
            ],
            [
                'city' => 'Pardubice',
                'province' => 'Pardubice I',
                'street' => 'Pernštýnské náměstí',
                'coordinates' => DB::raw('POINT(50.0344, 15.7750)'),
            ],
            [
                'city' => 'Zlín',
                'province' => 'Zlín',
                'street' => 'náměstí Míru',
                'coordinates' => DB::raw('POINT(49.2266, 17.6667)'),
            ],
            [
                'city' => 'Kladno',
                'province' => 'Kladno',
                'street' => 'náměstí starosty Pavla',
                'coordinates' => DB::raw('POINT(50.1436, 14.1028)'),
            ],
            [
                'city' => 'Most',
                'province' => 'Most',
                'street' => 'náměstí hrdinů',
                'coordinates' => DB::raw('POINT(50.5036, 13.6367)'),
            ],
            [
                'city' => 'Karviná',
                'province' => 'Karviná',
                'street' => 'náměstí Dr. E. Beneše',
                'coordinates' => DB::raw('POINT(49.8544, 18.5411)'),
            ],
            [
                'city' => 'Frýdek-Místek',
                'province' => 'Frýdek-Místek',
                'street' => 'náměstí Svobody',
                'coordinates' => DB::raw('POINT(49.6833, 18.3500)'),
            ],
            [
                'city' => 'Teplice',
                'province' => 'Teplice',
                'street' => 'náměstí Svobody',
                'coordinates' => DB::raw('POINT(50.6400, 13.8244)'),
            ],
            [
                'city' => 'Chomutov',
                'province' => 'Chomutov',
                'street' => 'náměstí 1. máje',
                'coordinates' => DB::raw('POINT(50.4600, 13.4200)'),
            ],
            [
                'city' => 'Česká Lípa',
                'province' => 'Česká Lípa',
                'street' => 'náměstí T. G. Masaryka',
                'coordinates' => DB::raw('POINT(50.6850, 14.5372)'),
            ],
            [
                'city' => 'Třebíč',
                'province' => 'Třebíč',
                'street' => 'náměstí Zachariáše z Hradce',
                'coordinates' => DB::raw('POINT(49.2167, 15.8833)'),
            ],
            [
                'city' => 'Třinec',
                'province' => 'Třinec',
                'street' => 'náměstí Svobody',
                'coordinates' => DB::raw('POINT(49.6772, 18.6700)'),
            ],
            [
                'city' => 'Brno',
                'province' => 'Brno-střed',
                'street' => 'náměstí Svobody',
                'coordinates' => DB::raw('POINT(49.1951, 16.6070)'),
            ],
            [
                'city' => 'Olomouc',
                'province' => 'Olomouc',
                'street' => 'Horní náměstí',
                'coordinates' => DB::raw('POINT(49.5938, 17.2509)'),
            ],
            [
                'city' => 'Opava',
                'province' => 'Opava',
                'street' => 'Horní náměstí',
                'coordinates' => DB::raw('POINT(49.9386, 17.9060)'),
            ],
            [
                'city' => 'Jihlava',
                'province' => 'Jihlava',
                'street' => 'Masarykovo náměstí',
                'coordinates' => DB::raw('POINT(49.3961, 15.5912)'),
            ],
            [
                'city' => 'Havířov',
                'province' => 'Havířov',
                'street' => 'náměstí Republiky',
                'coordinates' => DB::raw('POINT(49.7798, 18.4369)'),
            ],
            [
                'city' => 'Praha',
                'province' => 'Praha 1',
                'street' => 'Staroměstské náměstí',
                'coordinates' => DB::raw('POINT(50.0878, 14.4212)'),
            ],
        ];
        foreach ($locations as $locationData) {
            Location::create([
                'city' => $locationData['city'],
                'province' => $locationData['province'],
                'street' => $locationData['street'],
                'coordinates' => $locationData['coordinates'],
            ]);
        }
    }
}
