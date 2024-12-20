<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'modalidade',
        'data_limite',
        'vagas',
    ];

    public function alunos()
    {
        return $this->belongsToMany(Aluno::class, 'curso_aluno');
    }
    
}
