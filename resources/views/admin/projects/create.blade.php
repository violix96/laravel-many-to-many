@extends('layouts.app')

@section('content')
    <div class="container font bg-success mt-5">
        <h1 class="text-center">Crea progetto</h1>
        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="languages">Linguaggi</label>
                <input type="text" name="languages" id="languages" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" required>
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
                                value="{{ $technology->id }}" id="technology-{{ $technology->id }}">
                            <label class="form-check-label" for="technology-{{ $technology->id }}">
                                {{ $technology->title }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div>
                <label for="cover-image" class="form-label">Carica un' immagine</label>
                <input class="form-control form-control-lg" id="cover-image" type="file" name="cover_image">
            </div>

            <button type="submit" class="btn btn-primary mt-3 mb-3">Crea</button>
        </form>
    </div>
@endsection
