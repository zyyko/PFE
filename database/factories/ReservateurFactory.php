<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservateur>
 */
class ReservateurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'NOM_UTILISATEUR' => fake()->name(),
            'EMAIL' => fake()->unique()->safeEmail(),
            'MOT_DE_PASS' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'DATE_INSCRIPTION' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
        ];
    }
}
