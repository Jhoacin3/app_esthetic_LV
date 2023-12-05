<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
{
    $user = Auth::user();

    if ($client->role === 'cliente') {
        return Inertia::render('welcome_cliente');
    } elseif ($user->role === 'users') {
        return Inertia::render('welcome');
    }
}

}
