@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h1 class="font">Lista dei progetti</h1>
            </div>
            <div class="col-3 d-flex justify-content-end">
                <a href="{{ route('projects.create') }}" class="btn btn-primary mt-3 mb-3">Crea un nuovo progetto</a>
            </div>
        </div>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <table class="table font">
            <thead>
                <tr>
                    <th>ID</th>
                    {{-- <th>User</th> --}}
                    <th>Title</th>
                    <th>Languages</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        {{-- <td>{{ $type->user ? $type->user->name : 'Nessun Utente' }}</td> --}}
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->languages }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info"><i
                                        class="fa-solid fa-magnifying-glass"></i></a>
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning"><i
                                        class="fa-solid fa-pencil"></i></a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
