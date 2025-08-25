<!-- filepath: c:\laragon\www\project-manager\Modules\Projects\resources\views\edit_task.blade.php -->
@extends('layouts.dashboard')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow rounded p-8 mt-8">
        <h1 class="text-2xl font-bold mb-6">Edit Task</h1>
        <form method="POST" action="{{ route('tasks.update', $task->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block font-semibold mb-2">Title</label>
                <input type="text" name="title" class="w-full border rounded px-3 py-2" value="{{ $task->title }}"
                    required>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-2">Description</label>
                <textarea name="description" class="w-full border rounded px-3 py-2">{{ $task->description }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-2">Status</label>
                <select name="status" class="w-full border rounded px-3 py-2">
                    <option value="pending" @if ($task->status == 'pending') selected @endif>Pending</option>
                    <option value="in_progress" @if ($task->status == 'in_progress') selected @endif>In Progress</option>
                    <option value="completed" @if ($task->status == 'completed') selected @endif>Completed</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-2">Due Date</label>
                <input type="date" name="due_date" class="w-full border rounded px-3 py-2" value="{{ $task->due_date }}">
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-2">Project</label>
                <select name="project_id" class="w-full border rounded px-3 py-2">
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" @if ($task->project_id == $project->id) selected @endif>
                            {{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-2">Assign To</label>
                <select name="user_id" class="w-full border rounded px-3 py-2">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @if ($task->user_id == $user->id) selected @endif>
                            {{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
        </form>
    </div>
@endsection
