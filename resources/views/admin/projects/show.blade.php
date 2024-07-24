@extends('layouts.app')

@section('content')
    <div class="container bg-primary py-3" style="color: white">
        <h1>{{ $project->title }}</h1>
        <p>{{ $project->description }}</p>
        <p class="text-white">
            <strong>Type:</strong>
            {{ $project->type ? $project->type->title : 'tipo non definito' }}
        </p>
        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Modifica</a>
        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection
