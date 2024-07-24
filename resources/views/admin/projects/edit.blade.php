@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica progetto</h1>
        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $project->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea name="description" id="description" class="form-control">{{ $project->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="languages">Linguaggi</label>
                <input type="text" name="languages" id="languages" class="form-control" value="{{ $project->languages }}"
                    required>
            </div>
            <div class="form-group">
                <label for="languages">Type</label>
                <input type="text" name="slug" id="slug" class="form-control" value="{{ $project->slug }}"
                    required>
            </div>

            <div class="form-group">
                <label for="description">Categoria</label>
                <select class="form-select" aria-label="Default select example" name="type_id">
                    <option value="">Seleziona la categoria</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">
                            {{ $type->title }}
                        </option>
                    @endforeach
                </select>

            </div>

            <button type="submit" class="btn btn-primary mt-3">Modifica</button>
        </form>
    </div>
@endsection
