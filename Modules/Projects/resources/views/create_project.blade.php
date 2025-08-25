<!-- filepath: c:\laragon\www\project-manager\Modules\Projects\resources\views\create.blade.php -->
@extends('layouts.dashboard')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow rounded p-8 mt-8">
    <h1 class="text-2xl font-bold mb-6">Create New Project</h1>
    <form method="POST" action="{{ route('projects.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block font-semibold mb-2">Name</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-2">Description</label>
            <textarea name="description" class="w-full border rounded px-3 py-2"></textarea>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-2">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="active">Active</option>
                <option value="completed">Completed</option>
                <option value="archived">Archived</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-2">Start Date</label>
            <input type="date" name="start_date" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-2">End Date</label>
            <input type="date" name="end_date" class="w-full border rounded px-3 py-2">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create</button>
    </form>
</div>
@endsection