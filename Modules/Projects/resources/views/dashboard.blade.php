@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Projects Section -->
            <div>
                <h2 class="text-xl font-semibold mb-4">Projects</h2>
                <div class="grid gap-4">
                    @foreach ($projects as $project)
                        <a href="{{ route('projects.show', $project->id) }}"
                            class="bg-white shadow rounded p-4 flex flex-col transition transform hover:-translate-y-1 hover:shadow-lg hover:bg-blue-50 cursor-pointer">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-lg font-bold">{{ $project->name }}</span>
                                <span
                                    class="px-2 py-1 rounded text-xs bg-blue-100 text-blue-800">{{ $project->status }}</span>
                            </div>
                            <div class="text-gray-600 mb-2">{{ $project->description }}</div>
                            <div class="flex justify-between text-sm text-gray-500">
                                <span>Users: {{ $project->users_count }}</span>
                                <span>Tasks: {{ $project->tasks_count ?? 0 }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Tasks Section -->
            <div>
                <h2 class="text-xl font-semibold mb-4">Recent Tasks</h2>
                <div class="grid gap-4">
                    @foreach ($tasks as $task)
                        <a href="{{ route('tasks.show', $task->id) }}"
                            class="bg-white shadow rounded p-4 flex flex-col transition transform hover:-translate-y-1 hover:shadow-lg hover:bg-green-50 cursor-pointer">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-lg font-bold">{{ $task->title }}</span>
                                <span
                                    class="px-2 py-1 rounded text-xs bg-green-100 text-green-800">{{ $task->status }}</span>
                            </div>
                            <div class="text-gray-600 mb-2">{{ $task->description }}</div>
                            <div class="flex justify-between text-sm text-gray-500">
                                <span>Project: {{ $task->project->name ?? '-' }}</span>
                                <span>Assigned: {{ $task->user->name ?? '-' }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
