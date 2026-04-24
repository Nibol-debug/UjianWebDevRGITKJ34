<?php

namespace Database\Factories;

use App\Models\Seles;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Seles>
 */
class SelesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'supplier_id' => \App\Models\Suppliers::factory(),
            'total' => $this->faker->numberBetween(1000, 100000),
        ];
    }
}
