<?php

namespace App\Http\Controllers\AuthClient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Client;

class AuthClientAuthenticatedSessionController extends Controller
{

    public function create(): Response
    {
        return Inertia::render('Auth/Login_cliente', [
            'canResetPassword' => Route::has('password.request.cliente'),
            'status' => session('status'),
        ]);
    }

//     protected function authenticated(Request $request, $user)
// {
//     if ($user->esCliente()) {
//         return redirect()->intended(route('dashboard-cliente'));
//     }

//     return redirect()->intended(route('dashboard'));
// }


    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProviderCliente::HOME);
    }

    // protected function redirectBasedOnRole(Request $request)
    // {
    //     if (auth()->user()->esAdmin()) {
    //         return redirect()->route('dashboard-admin');
    //     } else {
    //         return redirect()->route('dashboard-cliente');
    //     }
    // }

    // protected function redirectTo()
    // {
    //     if (auth()->user()->esCliente()) {
    //         return route('dashboard-cliente');
    //     }

    //     return route('dashboard');
    // }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}