<?php

namespace Database\Factories;


use App\Models\Attendee;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AttendeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attendee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'checked_in' => null,
            'ticket_id' => Ticket::factory(),
        ];
    }

    /**
     * Specify that the attendee has checked in.
     *
     * @return $this
     */
    public function checkedIn(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'checked_in' => $this->faker->dateTimeBetween('-2 hours', '+0 hours'),
            ];
        });
    }


    /**
     * Specify that the attendee has checked in.
     *
     * @return $this
     */
    public function withGuest(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'guest_id' => Attendee::factory(),
            ];
        });
    }
}
