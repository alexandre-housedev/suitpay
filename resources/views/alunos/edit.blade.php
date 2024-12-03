@extends('adminlte::page')

@section('title', 'Editar Aluno')

@section('content')
<h1>Editar Aluno</h1>
<div class="card">
    <div class="card-body">
        <form action="{{ route('alunos.update', $aluno->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $aluno->nome) }}" required>
                @error('nome')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $aluno->email) }}" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="curso_id">Cursos Matriculados</label>
                <select name="curso_id[]" id="curso_id" class="form-control select2" multiple>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id }}" 
                            {{ in_array($curso->id, $aluno->cursos->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $curso->nome }} ({{ $curso->tipo }})
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('alunos.index') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Selecione os cursos",
                allowClear: true
            });
        });
    </script>
@endsection
