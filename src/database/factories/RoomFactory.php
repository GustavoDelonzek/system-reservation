<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hotel_id' => $this->faker->randomElement(Hotel::all()->pluck('id')->toArray()),
            'room_type' => $this->faker->randomElement(['Single room', 'Double room', 'Twin room', 'Suite', 'Private room', 'Shared room', 'Deluxe room']),
            'price_per_night' => $this->faker->numberBetween(100, 400),
        ];
    }
}
