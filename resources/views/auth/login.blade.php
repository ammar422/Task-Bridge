<!-- filepath: c:\laragon\www\project-manager\resources\views\auth\login.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login | Task Bridge</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <div class="content-container w-full max-w-md mx-auto bg-white rounded-lg shadow-lg p-8">
        <div class="flex flex-col items-center mb-6">
            <img src="{{ asset("assets/imgs/TaskBridge.png") }}" alt="Task Bridge Logo" class="w-16 h-16 mb-2">
            <h1 class="text-2xl font-bold text-blue-700">Task Bridge</h1>
            <span class="text-gray-500 text-sm">Sign in to your account</span>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-green-600 font-semibold">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    autocomplete="username"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('email')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('password')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-4">
                <input id="remember_me" type="checkbox" name="remember"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" />
                <label for="remember_me" class="ml-2 text-sm text-gray-600">Remember me</label>
            </div>

            <div class="flex items-center justify-between mb-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                @endif
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700 transition">
                Log in
            </button>
        </form>
        <div class="mt-6 text-center">
            <span class="text-gray-600 text-sm">Don't have an account?</span>
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-semibold ml-1">Register</a>
        </div>
    </div>
</body>

</html>
