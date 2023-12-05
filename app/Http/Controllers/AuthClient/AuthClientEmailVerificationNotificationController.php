<?php

namespace App\Http\Controllers\AuthClient;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthClientEmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->client()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProviderCliente::HOME);
        }

        $request->client()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
