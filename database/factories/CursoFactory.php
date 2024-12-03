<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->unique()->sentence(3),
            'descricao' => $this->faker->paragraph(),
            'modalidade' => $this->faker->randomElement(['Online', 'Presencial']),
            'data_limite' => $this->faker->dateTimeBetween('now', '+1 year'),
            'vagas' => $this->faker->numberBetween(10, 100),
        ];
    }
}
