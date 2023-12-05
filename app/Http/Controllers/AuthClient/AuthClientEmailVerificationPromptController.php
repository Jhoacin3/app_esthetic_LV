<?php

namespace App\Http\Controllers\AuthClient;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AuthClientEmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|Response
    {
        return $request->client()->hasVerifiedEmail()
                    ? redirect()->intended(RouteServiceProviderCliente::HOME)
                    : Inertia::render('Auth/VerifyEmailCliente', ['status' => session('status')]);
    }

    public function show()
    {
        return view('auth.verify-email-client');
    }

}