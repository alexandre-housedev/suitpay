@extends('adminlte::page')

@section('title', 'Editar Curos')

@section('content')
<div class="container">
    <h1>Editar Curso</h1>
    <div class="card">
    <div class="card-body">
    <form action="{{ route('cursos.update', $curso->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome do Curso</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $curso->nome }}" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control">{{ $curso->descricao }}</textarea>
        </div>
        <div class="form-group">
            <label for="modalidade">Modalidade</label>
            <select name="modalidade" id="modalidade" class="form-control" required>
                <option value="Online" {{ $curso->modalidade == 'Online' ? 'selected' : '' }}>Online</option>
                <option value="Presencial" {{ $curso->modalidade == 'Presencial' ? 'selected' : '' }}>Presencial</option>
            </select>
        </div>
        <div class="form-group">
            <label for="data_limite">Data Limite</label>
            <input type="date" name="data_limite" id="data_limite" class="form-control" value="{{ $curso->data_limite }}" required>
        </div>
        <div class="form-group">
            <label for="vagas">Vagas</label>
            <input type="number" name="vagas" id="vagas" class="form-control" min="1" value="{{ $curso->vagas }}" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Atualizar</button>
        <a href="{{ route('cursos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>

</div>

</div>
@endsection
