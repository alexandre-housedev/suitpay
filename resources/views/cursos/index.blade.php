@extends('adminlte::page')

@section('title', 'Listar Cursos')


@section('content')
<div class="container">
    <h1>Lista de Cursos</h1>
    <a href="{{ route('cursos.create') }}" class="btn btn-primary mb-3">Adicionar Curso</a>
    <div class="card">
    <div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Modalidade</th>
                <th>Data Limite</th>
                <th>Vagas</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
                <tr>
                    <td>{{ $curso->id }}</td>
                    <td>{{ $curso->nome }}</td>
                    <td>{{ $curso->descricao }}</td>
                    <td>{{ $curso->modalidade }}</td>
                    <td>{{ $curso->data_limite }}</td>
                    <td>{{ $curso->vagas }}</td>
                    <td>
                        <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Paginação -->
    {{ $cursos->links('pagination::bootstrap-4', ['size' => 'sm']) }}

</div>

</div>

</div>
@endsection
