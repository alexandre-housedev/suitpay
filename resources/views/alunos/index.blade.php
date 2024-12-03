@extends('adminlte::page')

@section('title', 'Listar Alunos')

@section('content')
<div class="container">
    <h1>Lista de Alunos</h1>

<div class="card">
    <div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Cursos</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alunos as $aluno)
                <tr>
                    <td>{{ $aluno->id }}</td>
                    <td>{{ $aluno->nome }}</td>
                    <td>{{ $aluno->email }}</td>
                    <td>
                        @if($aluno->cursos->isEmpty())
                            <span>Não matriculado em nenhum curso</span>
                        @else
                            @foreach($aluno->cursos as $curso)
                                <span>{{ $curso->nome }}</span><br>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('alunos.edit', $aluno) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('alunos.destroy', $aluno) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" 
                                onclick="return confirm('Tem certeza que deseja excluir este aluno?')">
                                Excluir
                            </button>
                        </form>                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginação -->
    {{ $alunos->links('pagination::bootstrap-4', ['size' => 'sm']) }}
</div>

</div>

</div>

@endsection
