<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

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
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'languages' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'type_id' => 'required|exists:types,id',
            'technologies' => 'nullable|array',
            'technologies.*' => 'exists:technologies,id'
        ]);

        $project = Project::create($data);
        $project->technologies()->sync($request->input('technologies', []));

        return redirect()->route('projects.index');
    }

    public function show(Project $project)
    {
        $project->load('type', 'technologies');
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'languages' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'type_id' => 'required|exists:types,id',
            'technologies' => 'nullable|array',
            'technologies.*' => 'exists:technologies,id'
        ]);

        $project->update($data);
        $project->technologies()->sync($request->input('technologies', []));

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }
}
