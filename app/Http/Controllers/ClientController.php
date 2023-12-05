<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Inertia\Inertia;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::paginate(5);
        return Inertia::render('clients', [
            'clients' => $clients,
            'pagination' => $clients->toArray(), // Asegúrate de que los datos de paginación estén disponibles
        ]);
    }

    // En tu ClienteController.php
// public function index()
// {
//     // Verifica si el usuario está autenticado
//     if (Auth::check()) {
//         // Si el usuario es un empleado, muestra la vista de administración
//         if (auth()->user()->esUser()) {
//             return Inertia::render('dashboard'); // Ajusta el nombre de la vista según tus necesidades
//         } else {
//             // Si el usuario es un cliente, redirige a la vista para clientes (agendar citas, etc.)
//             return redirect()->route('dashboard_cliente');
//         }
//     } else {
//         // Si el usuario no está autenticado, muestra la vista de bienvenida general
//         return Inertia::render('Welcome', [
//             'canLogin' => Route::has('login'),
//             'canRegister' => Route::has('register'),
//             'laravelVersion' => Application::VERSION,
//             'phpVersion' => PHP_VERSION,
//         ]);
//     }
// }

    public function register(Request $request)
    {
        // Validar y guardar datos en la tabla clients
        $client = Client::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            // Otros campos necesarios...
        ]);

        // Iniciar sesión para el nuevo cliente
        auth()->login_cliente($client);

        // Redirigir al dashboard-cliente
        return redirect()->route('dashboard-cliente');
    }

public function bienvenidaCliente()
{
    return Inertia::render('welcome_cliente');
}

    public function create()
    {
        return Inertia::render('clients_agregar');
    }

    public function store(Request $request)
    {
        //validando los campos
           // Validando los campos
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|same:confirm-password',
    ]);
        $input = $request->all();
        //para proteger contraseña creada 
        $input['password'] = Hash::make($input['password']);

        $client = Client::create($input);
        return Inertia::location(route('clients'));
    }

    public function update(Request $request, string $id)
    {
        //validando los campos
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email' . $id,
            'password' => 'same:confirm-password',
        ]);
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $client = Client::find($id);
        $client->update($input);
        return Inertia::location(route('clients'));
    }

    public function destroy( string $id)
    {
        Client::find($id)->delete();
        return Inertia::location(route('clients'));
    }

    public function dashboard()
{
    return Inertia::render('Dashboard_cliente');
}

}
