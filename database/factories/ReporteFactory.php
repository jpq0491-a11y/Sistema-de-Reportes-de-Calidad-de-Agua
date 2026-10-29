<?php

namespace Database\Factories;

use App\Models\Reporte;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Reporte>
 */
class ReporteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'ubicacion' => fake()->streetAddress(),
            'descripcion' => fake()->sentence(),
            'fecha_inicio' => fake()->date(),
        ];
    }
}
