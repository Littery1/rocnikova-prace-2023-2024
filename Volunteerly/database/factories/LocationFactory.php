<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
   $countries = ['Czech Republic', 'Slovakia'];

        return [
            'street' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'postal_code' => $this->faker->postcode,
            'country' => $this->faker->randomElement($countries),
            'latitude' => $this->faker->latitude($min = 47, $max = 51), // Latitude range for Czech Republic and Slovakia
            'longitude' => $this->faker->longitude($min = 12, $max = 23), // Longitude range for Czech Republic and Slovakia
        ];
    }
}
