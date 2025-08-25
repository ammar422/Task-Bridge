<!-- filepath: c:\laragon\www\project-manager\Modules\Projects\resources\views\show_task.blade.php -->
@extends('layouts.dashboard')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow rounded p-8 mt-8">
        <h1 class="text-2xl font-bold mb-4">{{ $task->title }}</h1>
        <div class="mb-4 text-gray-600">{{ $task->description }}</div>
        <div class="mb-2">
            <span class="font-semibold">Status:</span>
            <span
                class="px-2 py-1 rounded text-xs
            @if ($task->status == 'completed') bg-green-100 text-green-800
            @elseif($task->status == 'in_progress') bg-yellow-100 text-yellow-800
            @else bg-blue-100 text-blue-800 @endif">
                {{ ucfirst(str_replace('_', ' ', $task->status)) }}
            </span>
        </div>
        <div class="mb-2"><span class="font-semibold">Due Date:</span> {{ $task->due_date }}</div>
        <div class="mb-2"><span class="font-semibold">Project:</span> {{ $task->project->name ?? '-' }}</div>
        <div class="mb-2"><span class="font-semibold">Assigned To:</span> {{ $task->user->name ?? '-' }}</div>
        <div class="flex gap-2 mt-6">
            <a href="{{ route('tasks.edit', $task->id) }}"
                class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
            <form method="POST" action="{{ route('tasks.destroy', $task->id) }}"
                onsubmit="return confirm('Are you sure?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Delete</button>
            </form>
        </div>
    </div>
@endsection
