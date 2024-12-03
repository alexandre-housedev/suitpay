@extends('adminlte::page')

@section('title', 'Criar Curos')

@section('content')
<div class="container">
    <h1>Criar Curso</h1>
    <div class="card">
    <div class="card-body">
    <form action="{{ route('cursos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome do Curso</label>
            <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite o nome do curso" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" placeholder="Descrição do curso"></textarea>
        </div>
        <div class="form-group">
            <label for="modalidade">Modalidade</label>
            <select name="modalidade" id="modalidade" class="form-control" required>
                <option value="Online">Online</option>
                <option value="Presencial">Presencial</option>
            </select>
        </div>
        <div class="form-group">
            <label for="data_limite">Data Limite</label>
            <input type="date" name="data_limite" id="data_limite" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="vagas">Vagas</label>
            <input type="number" name="vagas" id="vagas" class="form-control" min="1" placeholder="Número de vagas disponíveis" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Salvar</button>
        <a href="{{ route('cursos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
</div>

</div>
@endsection
