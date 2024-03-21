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
            'street' => $this->faker->streetName, 
            'city' => $this->faker->city,
            'district' => null,
            'postal_code' => $this->faker->postcode,
            'country' => 'Czech Republic', 
            'latitude' => $this->faker->latitude($min = 47, $max = 51), 
            'longitude' => $this->faker->longitude($min = 12, $max = 23), 
        ];
    }
}
