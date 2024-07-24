<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreTypeRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Type;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $types = Type::all();

        return view('admin.projects.create', compact('types'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'languages' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'type_id' => 'required|exists:types,id',
        ]);
        // dd($data);
        Project::create($data);

        return redirect()->route('projects.index');
    }

    public function show(Project $project)
    {

        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $types = Type::all(); // Recupera tutti i tipi di progetto
        return view('admin.projects.edit', compact('project', 'types')); // Passa i tipi alla vista
    }


    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'languages' => 'required|string|max:255',
            'slug' => 'required|string|max:255',


        ]);

        $project->update($request->all());

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');
    }
}
