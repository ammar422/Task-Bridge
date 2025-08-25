<!-- filepath: c:\laragon\www\project-manager\Modules\Projects\resources\views\edit.blade.php -->
@extends('layouts.dashboard')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow rounded p-8 mt-8">
        <h1 class="text-2xl font-bold mb-6">Edit Project</h1>
        <form method="POST" action="{{ route('projects.update', $project->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block font-semibold mb-2">Name</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2" value="{{ $project->name }}"
                    required>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-2">Description</label>
                <textarea name="description" class="w-full border rounded px-3 py-2">{{ $project->description }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-2">Status</label>
                <select name="status" class="w-full border rounded px-3 py-2">
                    <option value="active" @if ($project->status == 'active') selected @endif>Active</option>
                    <option value="completed" @if ($project->status == 'completed') selected @endif>Completed</option>
                    <option value="archived" @if ($project->status == 'archived') selected @endif>Archived</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-2">Start Date</label>
                <input type="date" name="start_date" class="w-full border rounded px-3 py-2"
                    value="{{ $project->start_date }}">
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-2">End Date</label>
                <input type="date" name="end_date" class="w-full border rounded px-3 py-2"
                    value="{{ $project->end_date }}">
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
        </form>
    </div>
@endsection
