<?php

namespace Modules\Projects\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Projects\Models\Task;
use App\Http\Controllers\Controller;
use Modules\Projects\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $projects = Project::withCount('users', 'tasks')->latest()->limit(10)->get();
        $tasks = Task::with('project', 'user')->latest()->latest()->limit(10)->get();
        return view('projects::dashboard', compact('projects', 'tasks'));
    }
}
