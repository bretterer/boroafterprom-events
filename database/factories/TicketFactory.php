<?php

namespace Database\Factories;


use App\Models\Attendee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'picked_up' => null,
            'paid_on' => null,
            'payment_type' => null,
            'payment_id' => null,
            'attendee_id' => null,
        ];
    }
}
