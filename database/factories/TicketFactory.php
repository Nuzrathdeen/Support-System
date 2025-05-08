<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition(): array
    {
        return [
            'customer_name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'description' => $this->faker->paragraph,
            'ref' => strtoupper(Str::random(10)),
            'status' => $this->faker->numberBetween(0, 3), // use integers instead of strings
        ];

    }
}
