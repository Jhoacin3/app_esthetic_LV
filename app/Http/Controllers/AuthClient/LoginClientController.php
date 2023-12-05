<?php

namespace App\Http\Controllers\AuthClient;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Models\Client;

class LoginClientController extends Controller
{
    use AuthenticatesUsers;
    use RegistersUsers;

    protected $redirectTo = '/dashboard-cliente';

    public function showLoginForm()
    {
        return view('auth-client.loginclient');
    }

    protected function guard()
    {
        return auth()->guard('client');
    }

}

