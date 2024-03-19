<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;
use App\Models\Location;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $event = Event::create([
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'dateStart' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'dateEnd' => $this->faker->dateTimeBetween('+1 month', '+12 months'),
        ]);

        $event->update(['location_id' => $event->id]);

        return [
            'name' => $event->name,
            'description' => $event->description,
            'dateStart' => $event->dateStart,
            'dateEnd' => $event->dateEnd,
            'created_at' => $event->created_at,
            'updated_at' => $event->updated_at,
            'location_id' => $event->location_id,
        ];
    }
}
