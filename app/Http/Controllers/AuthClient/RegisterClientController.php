<?php

namespace App\Http\Controllers\AuthClient;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisterClientController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('Auth/Register_cliente');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.Client::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($client));

        Auth::login($client);

        return redirect(RouteServiceProviderCliente::HOME);
    }
}



