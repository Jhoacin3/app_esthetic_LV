<?php

namespace App\Http\Controllers\AuthClient;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;

class AuthClientConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     */
    public function show(): Response
    {
        return Inertia::render('Auth/ConfirmPasswordCliente');
    }

    /**
     * Confirm the user's password.
     */
    public function store(Request $request): RedirectResponse
    {
        if (! Auth::guard('web')->validate([
            'email' => $request->client()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password-cliente' => __('auth.password-cliente'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(RouteServiceProviderCliente::HOME);
    }
}
