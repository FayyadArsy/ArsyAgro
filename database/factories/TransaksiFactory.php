<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $randomTimestamp = $this->faker->dateTimeBetween('-1000 days', 'now');
        return [
            'nama' => fake()->name(),
            'tonase' => fake()->numberBetween(0, 5000),
            'harga' => '1600',
            'potongan' => fake()->numberBetween(50000,500000),
            'pelanggan_id' => mt_rand(1,20),
            'user_id' => mt_rand(1,6),
            'created_at' => $randomTimestamp,
        ];
    }
}
