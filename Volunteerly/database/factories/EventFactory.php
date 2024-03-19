<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        $startDate = $this->faker->dateTime();
        $endDate = $this->faker->dateTimeAfter($startDate);

        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'dateStart' => $startDate,
            'dateEnd' => $endDate,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
