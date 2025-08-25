<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Task Bridge Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-blue-600 text-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">Task Bridge</h1>
            <nav class="flex items-center space-x-2">
                <a href="{{ route('dashboard') }}" class="px-3 py-2 hover:bg-blue-700 rounded">Dashboard</a>
                <a href="{{ route('projects.index') }}" class="px-3 py-2 hover:bg-blue-700 rounded">Projects</a>
                <a href="{{ route('tasks.index') }}" class="px-3 py-2 hover:bg-blue-700 rounded">Tasks</a>
                @auth
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                            class="px-3 py-2 hover:bg-blue-700 rounded flex items-center focus:outline-none">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false"
                            class="absolute right-0 mt-2 w-48 bg-white text-gray-700 rounded shadow-lg z-50">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-blue-100">Profile</a>
                            <a href="{{ route('settings') }}" class="block px-4 py-2 hover:bg-blue-100">Settings</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-blue-100">Logout</button>
                            </form>
                        </div>
                    </div>
                @endauth
            </nav>
        </div>
    </header>
    <div class="flex flex-1">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg hidden md:block">
            <div class="p-6">
                <ul>
                    <li class="mb-4">
                        <a href="{{ route('dashboard') }}" class="flex items-center text-blue-600 hover:text-blue-800">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 0H7v6m6-6v6m0 0H7v6m6-6v6" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('projects.index') }}"
                            class="flex items-center text-blue-600 hover:text-blue-800">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M9 17v-6h6v6m-6 0H7v6m6-6v6m0 0H7v6m6-6v6" />
                            </svg>
                            Projects
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('tasks.index') }}"
                            class="flex items-center text-blue-600 hover:text-blue-800">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M5 13l4 4L19 7" />
                            </svg>
                            Tasks
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white text-center py-4">
        &copy; {{ date('Y') }} Task Bridge. All rights reserved.
    </footer>
</body>

</html>
