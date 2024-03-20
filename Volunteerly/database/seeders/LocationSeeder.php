<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location; // Import the Location model

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
                'district' => 'Moravská Ostrava a Přívoz',
                'street' => 'Masarykovo náměstí',
                'latitude' => 49.8346,
                'longitude' => 18.2922,
            ],
            [
                'city' => 'Plzeň',
                'district' => 'Plzeň 3',
                'street' => 'Náměstí Republiky',
                'latitude' => 49.7475,
                'longitude' => 13.3776,
            ],
            [
                'city' => 'Liberec',
                'district' => 'Liberec 1',
                'street' => 'náměstí Dr. E. Beneše',
                'latitude' => 50.7671,
                'longitude' => 15.0566,
            ],
            [
                'city' => 'České Budějovice',
                'district' => 'České Budějovice 1',
                'street' => 'náměstí Přemysla Otakara II.',
                'latitude' => 48.9744,
                'longitude' => 14.4746,
            ],
            [
                'city' => 'Hradec Králové',
                'district' => 'Hradec Králové',
                'street' => 'Velké náměstí',
                'latitude' => 50.2094,
                'longitude' => 15.8328,
            ],
            [
                'city' => 'Ústí nad Labem',
                'district' => 'Ústí nad Labem-město',
                'street' => 'Mírové náměstí',
                'latitude' => 50.6607,
                'longitude' => 14.0320,
            ],
            [
                'city' => 'Pardubice',
                'district' => 'Pardubice I',
                'street' => 'Pernštýnské náměstí',
                'latitude' => 50.0344,
                'longitude' => 15.7750,
            ],
            [
                'city' => 'Zlín',
                'district' => 'Zlín',
                'street' => 'náměstí Míru',
                'latitude' => 49.2266,
                'longitude' => 17.6667,
            ],
            [
                'city' => 'Kladno',
                'district' => 'Kladno',
                'street' => 'náměstí starosty Pavla',
                'latitude' => 50.1436,
                'longitude' => 14.1028,
            ],
            [
                'city' => 'Most',
                'district' => 'Most',
                'street' => 'náměstí hrdinů',
                'latitude' => 50.5036,
                'longitude' => 13.6367,
            ],
            [
                'city' => 'Karviná',
                'district' => 'Karviná',
                'street' => 'náměstí Dr. E. Beneše',
                'latitude' => 49.8544,
                'longitude' => 18.5411,
            ],
            [
                'city' => 'Frýdek-Místek',
                'district' => 'Frýdek-Místek',
                'street' => 'náměstí Svobody',
                'latitude' => 49.6833,
                'longitude' => 18.3500,
            ],
            [
                'city' => 'Teplice',
                'district' => 'Teplice',
                'street' => 'náměstí Svobody',
                'latitude' => 50.6400,
                'longitude' => 13.8244,
            ],
            [
                'city' => 'Chomutov',
                'district' => 'Chomutov',
                'street' => 'náměstí 1. máje',
                'latitude' => 50.4600,
                'longitude' => 13.4200,
            ],

            [
                'city' => 'Valašské Meziříčí',
                'district' => 'Valašské Meziříčí',
                'street' => 'náměstí Míru',
                'latitude' => 49.4711,
                'longitude' => 17.9711,
            ],
            [
                'city' => 'Litvínov',
                'district' => 'Litvínov',
                'street' => 'náměstí Míru',
                'latitude' => 50.6000,
                'longitude' => 13.6000,
            ],
            [
                'city' => 'Nový Jičín',
                'district' => 'Nový Jičín',
                'street' => 'náměstí Míru',
                'latitude' => 49.6000,
                'longitude' => 18.1000,
            ],
            [
                'city' => 'Uherské Hradiště',
                'district' => 'Uherské Hradiště',
                'street' => 'náměstí Míru',
                'latitude' => 49.0667,
                'longitude' => 17.4500,
            ],
            [
                'city' => 'Žďár nad Sázavou',
                'district' => 'Žďár nad Sázavou',
                'street' => 'náměstí Míru',
                'latitude' => 49.5667,
                'longitude' => 15.9333,
            ],
            [
                'city' => 'Otrokovice',
                'district' => 'Otrokovice',
                'street' => 'náměstí Míru',
                'latitude' => 49.2167,
                'longitude' => 17.5333,
            ],
            [
                'city' => 'Benešov',
                'district' => 'Benešov',
                'street' => 'náměstí Míru',
                'latitude' => 49.7833,
                'longitude' => 14.6833,
            ],
            [
                'city' => 'Mělník',
                'district' => 'Mělník',
                'street' => 'náměstí Míru',
                'latitude' => 50.3500,
                'longitude' => 14.4833,
            ],
            [
                'city' => 'Kutná Hora',
                'district' => 'Kutná Hora',
                'street' => 'náměstí Míru',
                'latitude' => 49.9500,
                'longitude' => 15.2667,
            ],
            [
                'city' => 'Český Těšín',
                'district' => 'Český Těšín',
                'street' => 'náměstí Míru',
                'latitude' => 49.7500,
                'longitude' => 18.6333,
            ],



        ];

        foreach ($locations as $locationData) {
            Location::create([
                'city' => $locationData['city'],
                'district' => $locationData['district'],
                'street' => $locationData['street'],
                'latitude' => $locationData['latitude'],
                'longitude' => $locationData['longitude'],
            ]);
        }
    }
}
