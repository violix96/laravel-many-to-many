@extends('layouts.app')

@section('content')
    <div class="container bg-success font py-3 mt-5" style="color: white">
        <h1 class="">{{ $project->title }}</h1>
        <p>{{ $project->description }}</p>
        <p class="text-white ">
            <strong>Type:</strong>
            {{ $project->type ? $project->type->title : 'tipo non definito' }}
        </p>

        <h3>Tecnologie usate :</h3>
        @if ($project->technologies->isEmpty())
            <p>Nessuna tecnologia utilizzata per questo progetto</p>
        @else
            <ul>
                @foreach ($project->technologies as $technology)
                    <li>{{ $technology->title }}</li>
                @endforeach
            </ul>
        @endif

        <h3>Foto:</h3>
        <div class="mt-3 mb-3">
            @if ($project->cover_image)
                <img src="{{ asset('storage/' . $project->cover_image) }}" alt="Immagine del progetto {{ $project->title }}"
                    class="img-fluid">
            @else
                <p>Immagine non disponibile</p>
            @endif
        </div>



        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Modifica</a>
        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection
