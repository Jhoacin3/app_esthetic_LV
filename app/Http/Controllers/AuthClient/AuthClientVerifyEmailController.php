<?php

namespace App\Http\Controllers\AuthClient;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class AuthClientVerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->client()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProviderCliente::HOME.'?verified=1');
        }

        if ($request->client()->markEmailAsVerified()) {
            event(new Verified($request->client()));
        }

        return redirect()->intended(RouteServiceProviderCliente::HOME.'?verified=1');
    }

    public function show()
    {
        return view('auth.verify-email-client');
    }
}