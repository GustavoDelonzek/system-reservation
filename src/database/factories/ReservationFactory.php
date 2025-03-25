<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomElement(User::all()->pluck('id')->toArray()),
            'room_id' => $this->faker->randomElement(Room::all()->pluck('id')->toArray()),
            'check_in_date' => $this->faker->date(),
            'check_out_date' => $this->faker->date(),
            'total_price' => $this->faker->numberBetween(100, 400),
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'canceled']),
        ];
    }
}
