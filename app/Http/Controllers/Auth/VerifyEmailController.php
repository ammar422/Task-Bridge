<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        // dd($request->user());
        if ($request->user()->hasVerifiedEmail()) {
            $route =  $request->user()->title == 'owner' ?  redirect()->intended(route('projects.create', absolute: false) . '?verified=1') :
                redirect()->intended(route('dashboard', absolute: false) . '?verified=1');
            return $route;
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        $route =  $request->user()->title == 'owner' ?  redirect()->intended(route('projects.create', absolute: false) . '?verified=1') :
            redirect()->intended(route('dashboard', absolute: false) . '?verified=1');
        return $route;
    }
}
