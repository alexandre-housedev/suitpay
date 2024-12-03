<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;


class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::paginate(15);
        return view('cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|unique:cursos,nome',
            'modalidade' => 'required|in:Online,Presencial',
            'data_limite' => 'required|date|after_or_equal:today',
            'vagas' => 'required|integer|min:1',
        ]);

        Curso::create($request->all());        
        return redirect()->route('cursos.index')->with('success', 'Curso criado com sucesso.');

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
    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nome' => 'required|string|unique:cursos,nome,' . $curso->id,
            'modalidade' => 'required|in:Online,Presencial',
            'data_limite' => 'required|date|after_or_equal:today',
            'vagas' => 'required|integer|min:1',
        ]);
    
        $curso->update($request->all());    
        return redirect()->route('cursos.index')->with('success', 'Curso atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index')->with('success', 'Curso excluído com sucesso.');
    }
}
