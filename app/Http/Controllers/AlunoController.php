<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alunos = Aluno::with('cursos')->paginate(15);
        $cursos = Curso::all();
        return view('alunos.index', compact('alunos', 'cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cursos = Curso::all();
        return view('alunos.create', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:alunos',
        ]);

        Aluno::create($request->all());
        return redirect()->route('alunos.index')->with('success', 'Aluno cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aluno $aluno)
    {

        $cursos = Curso::all();
        return view('alunos.edit', compact('aluno', 'cursos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aluno $aluno)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:alunos,email,' . $aluno->id,
        ]);

        $aluno->update($request->all());
        return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        return redirect()->route('alunos.index')->with('success', 'Aluno excluído com sucesso!');
    }

    public function matricularAluno(Request $request, Aluno $aluno)
    {
        $request->validate([
            'curso_id' => 'required|exists:cursos,id',
        ]);

        $curso = Curso::find($request->curso_id);

        if($curso->data_limite < now())
        {
            return back()->withErrors(['curso_id' => 'O prazo para matrícula neste curso já expirou, por favor tente outro curso']);
        }

        if ($curso->alunos()->count() >= $curso->vagas)
        {
            return back()->withErrors(['curso_id' => 'Este curso já atingiu o limite máximo de matrículas, por favor tente outro curso']);
        }

        $aluno->cursos()->attach($curso);
        return back()->with('success', 'Aluno matriculado com sucesso!');
    }
}
