@extends('layouts.dashboard')

@section('content')
    <div x-data="{ open: false }" class="max-w-2xl mx-auto bg-white shadow rounded p-8 mt-8">
        <h1 class="text-2xl font-bold mb-4">{{ $project->name }}</h1>
        <div class="mb-4 text-gray-600">{{ $project->description }}</div>
        <div class="mb-2">
            <span class="font-semibold">Status:</span>
            <span
                class="px-2 py-1 rounded text-xs 
            @if ($project->status == 'completed') bg-green-100 text-green-800
            @elseif($project->status == 'archived') bg-gray-200 text-gray-700
            @else bg-blue-100 text-blue-800 @endif">
                {{ ucfirst($project->status) }}
            </span>
        </div>
        <div class="mb-2"><span class="font-semibold">Start Date:</span> {{ $project->start_date }}</div>
        <div class="mb-2"><span class="font-semibold">End Date:</span> {{ $project->end_date }}</div>
        <div class="mb-2"><span class="font-semibold">Users:</span> {{ $project->users->count() }}</div>
        <div class="flex gap-2 mt-6 mb-8">
            <a href="{{ route('projects.edit', $project->id) }}"
                class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit Project</a>
            <form method="POST" action="{{ route('projects.destroy', $project->id) }}"
                onsubmit="return confirm('Are you sure?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Delete</button>
            </form>
        </div>

        <!-- Assign New Task Button -->
        <div class="mb-6">
            <button @click="open = true"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition inline-block">
                + Assign New Task
            </button>
        </div>

        <!-- Modal Popup Form -->
        <div x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40">
            <div @click.away="open = false" class="bg-white rounded shadow-lg w-full max-w-lg p-6 relative">
                <button @click="open = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                    &times;
                </button>
                <h2 class="text-xl font-bold mb-4">Assign New Task</h2>
                <form method="POST" action="{{ route('tasks.store') }}">
                    @csrf
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <div class="mb-4">
                        <label class="block font-semibold mb-2">Title</label>
                        <input type="text" name="title" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold mb-2">Description</label>
                        <textarea name="description" class="w-full border rounded px-3 py-2"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold mb-2">Status</label>
                        <select name="status" class="w-full border rounded px-3 py-2">
                            <option value="pending">Pending</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold mb-2">Due Date</label>
                        <input type="date" name="due_date" class="w-full border rounded px-3 py-2">
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold mb-2">Assign To</label>
                        <select name="user_id" class="w-full border rounded px-3 py-2">
                            @foreach (\Modules\Users\Models\User::all() as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="button" @click="open = false"
                            class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300">Cancel</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create
                            Task</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tasks Section -->
        <h2 class="text-xl font-semibold mb-4">Tasks</h2>
        @if ($project->tasks->count())
            <div class="flex flex-col gap-4">
                @foreach ($project->tasks as $task)
                    <a href="{{ route('tasks.show', $task->id) }}"
                        class="bg-gray-50 rounded p-4 shadow flex flex-col transition transform hover:-translate-y-1 hover:shadow-lg hover:bg-blue-100 cursor-pointer">
                        <div class="flex justify-between items-center mb-2">
                            <span class="font-bold text-blue-700">{{ $task->title }}</span>
                            <span
                                class="px-2 py-1 rounded text-xs
                                @if ($task->status == 'completed') bg-green-100 text-green-800
                                @elseif($task->status == 'in_progress') bg-yellow-100 text-yellow-800
                                @else bg-blue-100 text-blue-800 @endif">
                                {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                            </span>
                        </div>
                        <div class="text-gray-600 mb-2">{{ $task->description }}</div>
                        <div class="flex flex-col gap-1 text-xs text-gray-500">
                            <span>Assigned: {{ $task->user->name ?? '-' }}</span>
                            <span>Due: {{ $task->due_date }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="text-gray-500">No tasks for this project yet.</div>
        @endif
    </div>
@endsection
