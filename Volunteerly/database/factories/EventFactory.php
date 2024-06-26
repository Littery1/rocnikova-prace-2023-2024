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
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'dateStart'=> $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'dateEnd' => $this->faker->dateTimeBetween('+1 month', '+12 months'),
            'created_at' => now(),
            'updated_at' => now(),
            'locations_id' => null,
            'users_id' => null,
        ];
    }
}
