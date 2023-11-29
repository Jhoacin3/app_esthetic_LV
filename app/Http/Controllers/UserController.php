<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Symfony\Component\Console\Input\Input;


class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(10);

        return Inertia::render('users', compact('users'));
    }

    public function create()
    {
        //para poder crear un rol del empleado
        $roles = Role::pluck('name', 'name')->all();
        return Inertia::render('users_agregar', compact('roles'));
    }

    public function store(Request $request)
    {
        //validando los campos
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
        $input = $request->all();
        //para proteger contraseña creada 
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        return Inertia::location(route('users'));
    }

    // public function show(string $id)
    // {
    //     //
    // }

    public function edit(string $id)
    {
        //capturar los datos del usuario desde la tabla
        $user = User::find($id);
        //lo mismo pero con el rol
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $user->$roles->pluck('name', 'name')->all();
        return Inertia::render('users_editar', compact('user', 'roles', 'userRoles'));
    }

    public function update(Request $request, string $id)
    {
        //validando los campos
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        //analizar la siguiente linea
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        return Inertia::location(route('users'));
    }

    public function destroy(string $id)
    {
        User::find($id)->delete();
        return Inertia::location(route('users'));
        
    }
}
