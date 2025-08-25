@extends('layouts.dashboard')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow rounded p-8 mt-8">
        <h1 class="text-2xl font-bold mb-6">Settings</h1>
        <form method="POST" action="#">
            @csrf
            <!-- Example setting: Notification Preferences -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Email Notifications</label>
                <select class="w-full border rounded px-3 py-2">
                    <option value="enabled">Enabled</option>
                    <option value="disabled">Disabled</option>
                </select>
            </div>
            <!-- Add more settings fields as needed -->

            <button type="submit" disabled class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Save Settings
            </button>
        </form>
    </div>
@endsection