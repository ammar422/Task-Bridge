<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Modules\Users\Models\User;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Jobs\SendVerficationEmail;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'title' => 'required|in:backend,frontend,operations_team,product_team,managerial,owner',
            'mobile' => ['nullable', 'string', 'max:15'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'title' => $request->title,
            'role' => 'user',
            'phone_number' => $request->phone_number,
        ]);
        SendVerficationEmail::dispatch($user);
        Auth::login($user);
        $redirect = $request->title === 'owner' ? route('projects.index', absolute: false) : route('dashboard', absolute: false);
        return redirect($redirect);
    }
}
