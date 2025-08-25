@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Projects</h1>
            <a href="{{ route('projects.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">+ Create New Project</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($projects as $project)
                @php
                    // Status color and icon
                    switch ($project->status) {
                        case 'completed':
                            $statusColor = 'bg-green-100 text-green-800';
                            $iconColor = 'text-green-500';
                            $statusIcon =
                                '<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round"/></svg>';
                            break;
                        case 'archived':
                            $statusColor = 'bg-gray-200 text-gray-700';
                            $iconColor = 'text-gray-500';
                            $statusIcon =
                                '<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 01-2-2V7a2 2 0 012-2h14a2 2 0 012 2v12a2 2 0 01-2 2z"/><path d="M9 17v-6h6v6" stroke-linecap="round" stroke-linejoin="round"/></svg>';
                            break;
                        default:
                            // active
                            $statusColor = 'bg-blue-100 text-blue-800';
                            $iconColor = 'text-blue-500';
                            $statusIcon =
                                '<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 8v4l3 3" stroke-linecap="round" stroke-linejoin="round"/></svg>';
                            break;
                    }
                @endphp
                <a href="{{ route('projects.show', $project->id) }}"
                    class="bg-white shadow rounded p-6 flex flex-col transition transform hover:-translate-y-1 hover:shadow-lg hover:bg-blue-50 cursor-pointer h-full">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-lg font-bold flex items-center">
                            <!-- Project Icon -->
                            <svg class="w-5 h-5 mr-2 {{ $iconColor }}" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path d="M3 7V5a2 2 0 012-2h14a2 2 0 012 2v2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <rect x="3" y="7" width="18" height="13" rx="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            {{ $project->name }}
                        </span>
                        <span class="px-2 py-1 rounded text-xs flex items-center {!! $statusColor !!}">
                            {!! $statusIcon !!}
                            {{ ucfirst($project->status) }}
                        </span>
                    </div>
                    <div class="text-gray-600 mb-4 line-clamp-3 min-h-[72px]">
                        {{ $project->description }}
                    </div>
                    <!-- Widget Section -->
                    <div class="bg-gray-50 rounded p-3 mb-2 flex flex-col gap-2">
                        <div class="flex items-center">
                            <!-- Start Date Icon -->
                            <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <rect x="3" y="4" width="18" height="18" rx="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M16 2v4M8 2v4M3 10h18" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span class="text-xs text-gray-700">Start: {{ $project->start_date }}</span>
                        </div>
                        <div class="flex items-center">
                            <!-- End Date Icon -->
                            <svg class="w-4 h-4 mr-1 text-red-500" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <rect x="3" y="4" width="18" height="18" rx="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M16 2v4M8 2v4M3 10h18" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span class="text-xs text-gray-700">End: {{ $project->end_date }}</span>
                        </div>
                        <div class="flex items-center">
                            <!-- Users Icon -->
                            <svg class="w-4 h-4 mr-1 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M17 21v-2a4 4 0 00-3-3.87M9 21v-2a4 4 0 013-3.87M7 8a4 4 0 118 0 4 4 0 01-8 0z"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12 14v7" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span class="text-xs text-gray-700">Users: {{ $project->users->count() }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $projects->links() }}
        </div>
    </div>
@endsection
