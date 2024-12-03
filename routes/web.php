<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\AlunoController;
use Illuminate\Support\Facades\Route;

Route::prefix('cursos')->name('cursos.')->group(function () {
    Route::get('/', [CursoController::class, 'index'])->name('index'); // Listar cursos com paginação
    Route::get('/create', [CursoController::class, 'create'])->name('create'); // Formulário de criação
    Route::post('/', [CursoController::class, 'store'])->name('store'); // Salvar novo curso
    Route::get('/{curso}/edit', [CursoController::class, 'edit'])->name('edit'); // Formulário de edição
    Route::put('/{curso}', [CursoController::class, 'update'])->name('update'); // Atualizar curso
    Route::delete('/{curso}', [CursoController::class, 'destroy'])->name('destroy'); // Excluir curso
});

Route::prefix('alunos')->name('alunos.')->group(function () {
    Route::get('/', [AlunoController::class, 'index'])->name('index'); 
    Route::get('/create', [AlunoController::class, 'create'])->name('create'); 
    Route::post('/', [AlunoController::class, 'store'])->name('store');
    Route::get('/{aluno}/edit', [AlunoController::class, 'edit'])->name('edit');
    Route::put('/{aluno}', [AlunoController::class, 'update'])->name('update');
    Route::delete('/{aluno}', [AlunoController::class, 'destroy'])->name('destroy'); 
});
