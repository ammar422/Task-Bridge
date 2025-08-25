<!-- filepath: c:\laragon\www\project-manager\resources\views\welcome.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | Task Bridge</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-image: url('{{ asset('assets/imgs/generated-image.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .bg-gradient-overlay {
            background: linear-gradient(to bottom right, #2563ebcc, #6366f1cc, #8b5cf6cc);
            position: absolute;
            inset: 0;
            z-index: 0;
        }

        .content-container {
            position: relative;
            z-index: 10;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center">
    <div class="bg-gradient-overlay"></div>
    <div class="content-container w-full max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-8">
        <div class="flex flex-col items-center mb-6">
            <h1 class="text-3xl font-bold text-blue-700 mb-2">Task Bridge</h1>
            <span class="text-gray-500 text-base">Welcome to your project management platform</span>
        </div>

        <div class="bg-blue-50 rounded p-6 text-center text-gray-900 font-semibold mb-6">
            Manage your projects, tasks, and teams efficiently.<br>
            Get started by logging in or creating a new account.
        </div>

        <div class="flex justify-center gap-4">
            @if (Route::has('login'))
                <a href="{{ route('login') }}"
                    class="bg-blue-600 text-white px-6 py-2 rounded font-semibold hover:bg-blue-700 transition">
                    Log in
                </a>
            @endif
            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="bg-indigo-600 text-white px-6 py-2 rounded font-semibold hover:bg-indigo-700 transition">
                    Register
                </a>
            @endif
        </div>
    </div>
</body>

</html>
