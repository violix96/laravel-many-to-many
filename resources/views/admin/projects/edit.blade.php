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
                <label for="slug">Slug</label>
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
            <div class="form-group">
                <label for="technologies">Tecnologie</label>
                <div>
                    @foreach ($technologies as $technology)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="technologies[]"
                                value="{{ $technology->id }}" id="technology-{{ $technology->id }}"
                                {{ in_array($technology->id, $project->technologies->pluck('id')->toArray()) ? 'checked' : '' }}>
                            <label class="form-check-label" for="technology-{{ $technology->id }}">
                                {{ $technology->title }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Modifica</button>
        </form>
    </div>
@endsection
