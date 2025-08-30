<!-- filepath: c:\laragon\www\project-manager\resources\views\auth\register.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register | Task Bridge</title>
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
            <img src="{{ asset('assets/imgs/TaskBridge.png') }}" alt="Task Bridge Logo" class="w-16 h-16 mb-2">
            <h1 class="text-2xl font-bold text-blue-700">Task Bridge</h1>
            <span class="text-gray-500 text-sm">Create your account</span>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    autocomplete="name"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('name')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    autocomplete="email"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('email')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- title -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                <select name="title" id="title" required autocomplete="title"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="backend" {{ old('title') == 'backend' ? 'selected' : '' }}>Back-end</option>
                    <option value="frontend" {{ old('title') == 'frontend' ? 'selected' : '' }}>Fron-tend</option>
                    <option value="operations_team" {{ old('title') == 'operations_team' ? 'selected' : '' }}>
                        Operations Team</option>
                    <option value="product_team" {{ old('title') == 'product_team' ? 'selected' : '' }}>Product Team
                    </option>
                    <option value="managerial" {{ old('title') == 'managerial' ? 'selected' : '' }}>Managerial</option>
                    <option value="owner" {{ old('title') == 'owner' ? 'selected' : '' }}>Owner</option>
                    <option value="">Other</option>
                </select>
                @error('title')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- phone number -->
            <div class="mb-4">
                <label for="phone_number" class="block text-gray-700 font-semibold mb-2">Mobile</label>
                <input id="phone_number" type="tel" name="phone_number" value="{{ old('phone_number') }}"
                    autocomplete="tel"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('phone_number')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('password')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">Confirm
                    Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    autocomplete="new-password"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('password_confirmation')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center justify-between mt-4">
                <a class="text-sm text-blue-600 hover:underline" href="{{ route('login') }}">
                    Already registered?
                </a>
                <button type="submit"
                    class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition">
                    Register
                </button>
            </div>
        </form>
    </div>
</body>
