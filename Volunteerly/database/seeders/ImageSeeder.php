<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\Event;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = Event::inRandomOrder()->take(10)->get(); 

        foreach ($events as $event) {

            Image::factory()->count(36)->create([
                'events_id' => $event->id,
            ]);
        }    }
}
