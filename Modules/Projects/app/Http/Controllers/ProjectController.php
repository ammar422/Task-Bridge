<?php

namespace Modules\Projects\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Projects\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('users')->latest()->paginate(12);
        return view('projects::projects', compact('projects'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects::create_project');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,completed,archived',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);
        $project = Project::create($validated);
        return redirect()->route('projects.show', $project->id)->with('success', 'Project created!');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $project = Project::with('users' , 'tasks')->findOrFail($id);
        return view("projects::show_project", compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('projects::edit_project', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,completed,archived',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);
        $project = Project::findOrFail($id);
        $project->update($validated);
        return redirect()->route('projects.show', $project->id)->with('success', 'Project updated!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted!');
    }
}
