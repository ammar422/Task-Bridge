<!-- filepath: c:\laragon\www\project-manager\resources\views\auth\verify-email.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Verify Email | Task Bridge</title>
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

    <div class="w-full max-w-md mx-auto bg-white rounded-lg shadow-lg p-8">
        <div class="flex flex-col items-center mb-6">
            <svg class="w-12 h-12 text-blue-600 mb-2" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path d="M3 7V5a2 2 0 012-2h14a2 2 0 012 2v2" stroke-linecap="round" stroke-linejoin="round" />
                <rect x="3" y="7" width="18" height="13" rx="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <h1 class="text-2xl font-bold text-blue-700">Task Bridger</h1>
        </div>

        <div class="mb-4 text-sm text-gray-600 text-center">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 text-center">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex flex-col gap-4">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit"
                    class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700 transition">
                    {{ __('Resend Verification Email') }}
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full underline text-sm text-gray-600 hover:text-gray-900 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 py-2">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</body>

</html>
