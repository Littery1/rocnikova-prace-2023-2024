<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Retrieve the first 10 users
        $users = User::limit(10)->get();

        foreach ($users as $user) {
            // Retrieve all events for the current user
            $events = Event::where('users_id', $user->id)->get();

            foreach ($events as $event) {
                // Create one main image for the event
                Image::factory()->create([
                    'events_id' => $event->id,
                    'users_id' => null, // No associated user
                    'type' => 'main',
                ]);

                // Create 35 plain images for the event
                Image::factory()->count(35)->create([
                    'events_id' => $event->id,
                    'users_id' => null, // No associated user
                    'type' => 'plain',
                ]);
            }

            // Create one profile picture for the current user (ensure it's unique)
            $profilePicture = Image::factory()->create([
                'events_id' => null, // No associated event
                'users_id' => $user->id,
                'type' => 'user',
            ]);

            // Optionally, you can assign this image ID to the user's profile_picture_id column if you still want to keep that relationship
            $user->profile_picture_id = $profilePicture->id;
            $user->save();
        }   
     }
}
