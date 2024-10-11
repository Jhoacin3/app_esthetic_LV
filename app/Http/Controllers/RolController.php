<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// agregamos
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class RolController extends Controller
{
    // Constructor - Aplica middleware para proteger rutas 
    // según permisos asignados al rol
    function __construct()
    {
      // Middleware para vista de roles
      $this->middleware('permission:ver-rol | crear-rol | editar-rol | borrar-rol', ['only' => ['index']]);
      // Middleware para creación de roles  
      $this->middleware('permission:crear-rol', ['only' => ['create', 'store']]);
      // Middleware para edición de roles
      $this->middleware('permission:editar-rol', ['only' => ['edit', 'update']]);
      // Middleware para borrado de roles
      $this->middleware('permission:borrar-rol', ['only' => ['destroy']]);
    }
    // Obtiene lista paginada de roles
    public function index()
    {
      // Consulta paginada 
      $roles = Role::paginate(5);
      
        // return Inertia::render('users', ['users' => $users]);
        return Inertia::render('roles', [
          'roles' => $roles,
          'pagination' => $roles->toArray(), 
      ]);
     
    }
  
    public function create()
    {
        $permissions = Permission::get();
        return Inertia::render('roles_agregar', compact('permissions'));
    }
  
    // Crea un nuevo rol
      // Crea un nuevo rol
      public function store(Request $request)
      {
          $this->validate($request, [
              'name' => 'required|unique:roles,name',
              'permission' => 'required',
          ]);
      
          $role = Role::create(['name' => $request->input('name')]);
          $role->syncPermissions($request->input('permission'));
      
          // return Inertia::location(route('roles'));
          return Inertia::location(route('roles.index'));

      }
    
  
    // public function show(string $id)
    // {
    //     //
    // }
  
    public function edit($id)
    {
      $role = Role::find($id);
        $permission = Permission::get();

      $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return Inertia::render('roles_editar', compact('role','permission','rolePermissions'));
    }
  
  
       public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('roles.index');                        
    }
  
    public function destroy(string $id)
    {
      //sustituir
      // DB::table('roles')->where('id', $id)->delete();
      //por: 
      DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index');    
    }
  }
