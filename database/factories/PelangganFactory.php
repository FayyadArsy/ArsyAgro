<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelanggan>
 */
class PelangganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           
            'nama' => fake()->name(),
            'nohp' => fake()->phoneNumber(),
            'hutang' => fake()->numberBetween(5000000,10000000),
            'alamat' => fake()->address(),
  
        ];
    }
}
