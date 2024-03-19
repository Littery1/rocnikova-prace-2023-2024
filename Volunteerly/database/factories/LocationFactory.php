<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;
use App\Models\Location;
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
public function event()
{
    return $this->hasOne(Event::class, 'location_id');
}

    public function definition(): array
    {

        $countries = ['Czech Republic', 'Slovakia'];

        // Define specific ranges for latitude and longitude based on the countries
        $latitudeRange = ['Czech Republic' => [48.5, 51.1], 'Slovakia' => [47.7, 49.6]];
        $longitudeRange = ['Czech Republic' => [12.1, 18.9], 'Slovakia' => [16.8, 22.6]];

        $country = $this->faker->randomElement($countries);

        return [
            'street' => $this->faker->streetName,
            'city' => $this->faker->city($country),
            'postal_code' =>  $this->faker->postcode($country),
            'country' => $country,
            'latitude' => $this->faker->latitude($latitudeRange[$country][0], $latitudeRange[$country][1]),
            'longitude' => $this->faker->longitude($longitudeRange[$country][0], $longitudeRange[$country][1]),
        ];
    }
}
