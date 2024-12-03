<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlunoCursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aluno::all()->each(function ($aluno) {
            $cursos = Curso::inRandomOrder()->take(rand(1, 2))->pluck('id');
            $aluno->cursos()->attach($cursos);
        });
    }
}
