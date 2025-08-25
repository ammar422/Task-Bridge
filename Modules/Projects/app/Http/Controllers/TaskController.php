<?php

namespace Modules\Projects\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Projects\Models\Task;
use Modules\Projects\Models\Project;
use Modules\Users\Models\User;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('project', 'user')->latest()->paginate(12);
        return view('projects::tasks', compact('tasks'));
    }

    public function create()
    {
        $projects = Project::all();
        $users = User::all();
        return view('projects::create_task', compact('projects', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'nullable|date',
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
        ]);
        $task = Task::create($validated);
        return redirect()->route('tasks.show', $task->id)->with('success', 'Task created!');
    }

    public function show($id)
    {
        $task = Task::with('project', 'user')->findOrFail($id);
        return view('projects::show_task', compact('task'));
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $projects = Project::all();
        $users = User::all();
        return view('projects::edit_task', compact('task', 'projects', 'users'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'nullable|date',
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
        ]);
        $task = Task::findOrFail($id);
        $task->update($validated);
        return redirect()->route('tasks.show', $task->id)->with('success', 'Task updated!');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted!');
    }
}
