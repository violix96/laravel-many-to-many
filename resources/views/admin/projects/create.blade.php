@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crea progetto</h1>
        <form action="{{ route('projects.store') }}" method="POST">
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
                <label for="description">Type</label>
                <select class="form-select" aria-label="Default select example" name="type_id">
                    <option value="">Seleziona il type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">
                            {{ $type->title }}
                        </option>
                    @endforeach
                </select>

            </div>
            <button type="submit" class="btn btn-primary mt-3">Crea</button>
        </form>
    </div>
@endsection
