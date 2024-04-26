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
                'latitude' => 49.8358411,
                'longitude' => 18.2930222,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'city' => 'Plzeň',
                'province' => 'Plzeň 3',
                'street' => 'Náměstí Republiky',
                'latitude' => 49.7471438, 
                'longitude' => 13.3758785,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'city' => 'Liberec',
                'province' => 'Liberec 1',
                'street' => 'náměstí Dr. E. Beneše',
                'latitude' => 50.7697831,
                'longitude' => 15.0534263,
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            [
                'city' => 'České Budějovice',
                'province' => 'České Budějovice 1',
                'street' => 'náměstí Přemysla Otakara II.',
                'latitude' => 48.9745642,
                'longitude' => 14.4717705,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'city' => 'Hradec Králové',
                'province' => 'Hradec Králové',
                'street' => 'Velké náměstí',
                'latitude' => 50.2093194,
                'longitude' => 15.8264967,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'city' => 'Ústí nad Labem',
                'province' => 'Ústí nad Labem-město',
                'street' => 'Mírové náměstí',
                'latitude' => 50.6605343,
                'longitude' => 14.0386659,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'city' => 'Pardubice',
                'province' => 'Pardubice I',
                'street' => 'Pernštýnské náměstí',
                'latitude' => 50.0384492,
                'longitude' => 15.7767374,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'city' => 'Zlín',
                'province' => 'Zlín',
                'street' => 'náměstí Míru',
                'latitude' => 49.2262744,
                'longitude' => 17.6643513,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'city' => 'Kladno',
                'province' => 'Kladno',
                'street' => 'náměstí starosty Pavla',
                'latitude' => 50.1471417,
                'longitude' => 14.1002625,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'city' => 'Most',
                'province' => 'Most',
                'street' => 'náměstí hrdinů',
                'latitude' => 50.5036,
                'longitude' => 13.6367,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'city' => 'Karviná',
                'province' => 'Karviná',
                'street' => 'náměstí Dr. E. Beneše',
                'latitude' => 49.8544,
                'longitude' => 18.5411,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'city' => 'Frýdek-Místek',
                'province' => 'Frýdek-Místek',
                'street' => 'náměstí Svobody',
                'latitude' => 49.6833,
                'longitude' => 18.3500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'city' => 'Teplice',
                'province' => 'Teplice',
                'street' => 'náměstí Svobody',
                'latitude' => 50.6400,
                'longitude' => 13.8244,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'city' => 'Chomutov',
                'province' => 'Chomutov',
                'street' => 'náměstí 1. máje',
                'latitude' => 50.4600,
                'longitude' => 13.4200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'city' => 'Česká Lípa',
                'province' => 'Česká Lípa',
                'street' => 'náměstí T. G. Masaryka',
                'latitude' => 50.6850,
                'longitude' => 14.5372,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'city' => 'Třebíč',
                'province' => 'Třebíč',
                'street' => 'náměstí Zachariáše z Hradce',
                'latitude' => 49.2167,
                'longitude' => 15.8833,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'city' => 'Třinec',
                'province' => 'Třinec',
                'street' => 'náměstí Svobody',
                'latitude' => 49.6772,
                'longitude' => 18.6700,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'city' => 'Brno',
                'province' => 'Brno-střed',
                'street' => 'náměstí Svobody',
                'latitude' => 49.1951,
                'longitude' => 16.6070,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'city' => 'Olomouc',
                'province' => 'Olomouc',
                'street' => 'Horní náměstí',
                'latitude' => 49.5938,
                'longitude' => 17.2509,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'city' => 'Opava',
                'province' => 'Opava',
                'street' => 'Horní náměstí',
                'latitude' => 49.9386,
                'longitude' => 17.9060,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'city' => 'Jihlava',
                'province' => 'Jihlava',
                'street' => 'Masarykovo náměstí',
                'latitude' => 49.3961,
                'longitude' => 15.5912,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'city' => 'Havířov',
                'province' => 'Havířov',
                'street' => 'náměstí Republiky',
                'latitude' => 49.7798,
                'longitude' => 18.4369,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'city' => 'Praha',
                'province' => 'Praha 1',
                'street' => 'Staroměstské náměstí',
                'latitude' => 50.0878,
                'longitude' => 14.4212,
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ];
        foreach ($locations as $locationData) {
            Location::create([
                'city' => $locationData['city'],
                'province' => $locationData['province'],
                'street' => $locationData['street'],
                'latitude' => $locationData['latitude'],
                'longitude' => $locationData['longitude'],
                'updated_at' => now(),
                'created_at' => now(),
            ]);
        }
        }
    }

