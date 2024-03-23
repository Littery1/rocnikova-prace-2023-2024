<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Event;
use App\Models\Location;
use Illuminate\Database\Seeder;
use App\Models\User;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * ALTER TABLE public.events
    * ADD CONSTRAINT events_users_id_fkey
    * FOREIGN KEY (users_id) REFERENCES public.users (id);
     */
    public function run(): void
    {
        Event::factory(50)->create([
            'locations_id' => function () {
                return Location::inRandomOrder()->first()->id;
            },
            'users_id' => function () {
                return User::inRandomOrder()->first()->id;
            }
        ]);
    }
}
