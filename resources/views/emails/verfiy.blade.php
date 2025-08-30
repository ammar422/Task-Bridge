<!-- resources/views/emails/verify.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Task Bridge</title>
    <style>
        /* Inline Tailwind CSS styles for email compatibility */
        /* Example: adding Tailwind CSS classes for email compatibility */
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            text-align: center;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #777777;
            margin-top: 20px;
        }

        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }

        .panel {
            background-color: #f9f9f9;
            padding: 15px;
            border-left: 4px solid #4CAF50;
            margin-top: 20px;
        }
    </style>
</head>

<body style="background-color: #f4f7fc; margin: 0; padding: 0;">
    <div class="container">
        <h1 class="text-3xl font-semibold text-gray-800">Welcome, {{ $name }}</h1>

        <p class="text-lg text-gray-600 mt-2">
            Thank you for signing up with <strong>Task Bridge</strong>. We're excited to have you on board.
        </p>

        <a href="{{ $verificationUrl }}" class="btn mt-4 inline-block bg-blue-700 hover:bg-blue-800">
            Get Started
        </a>

        <p class="text-lg text-gray-600 mt-6">
            If you have any questions, feel free to reach out to us anytime.
        </p>

        <p class="mt-4">Thanks,</p>
        <p>The Task Bridge Team</p>

        <div class="panel mt-6">
            <strong>Your account details:</strong><br>
            Email: {{ $email }}
        </div>
    </div>

    <div class="footer">
        <p>© 2025 Task Bridge. All rights reserved.</p>
        <p>Need help? <a href="">Contact Support</a></p>
    </div>
</body>

</html>
