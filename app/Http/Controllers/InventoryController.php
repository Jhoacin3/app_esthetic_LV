<?php

namespace App\Http\Controllers;
// agregamos
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Inventory;
use Inertia\Inertia;

class InventoryController extends Controller
{
    //NOTA: Constructor te permite realizar tareas de inicialización y configuración comunes para todas las acciones del controlador
    function __construct()
    {
        $this->middleware('permission: ver-inventory | crear-inventory | editar-inventory | borrar-inventory')->only('index');
        $this->middleware('permission: crear-inventory', ['only' => ['create', 'store']]);  
        $this->middleware('permission: editar-inventory', ['only' => ['edit', 'update']]);
        $this->middleware('permission: borrar-inventory', ['only' => ['destroy']]);
    }


    public function index()
    {
        $inventories = Inventory::paginate(5);
        // Renderiza la vista utilizando Inertia y pasa la colección de inventarios
        return Inertia::render('inventories', ['inventories' => $inventories]);
    }


    public function create()
    {
        // Renderiza la vista utilizando Inertia
        return Inertia::render('inventories_agregar');
    }

    //para el boton de guardar en crear...
    public function store(Request $request)
    {
        request()->validate([
            'name' =>'required',
            'description' =>'required',
            'quantity' =>'required',
        ]);
        Inventory::create($request->all());

        return Inertia::location(route('inventories'));
    }


    // public function show(string $id)
    // {
    //     //
    // }


    public function edit(Inventory $inventorie)
    {
        return Inertia::render('inventories_editar', [
            //verificar
            'inventorie' => $inventorie,
        ]);
    }


    public function update(Request $request, Inventory $inventorie)
    {
        request()->validate([
            'name' =>'required',
            'description' =>'required',
            'quantity' =>'required',
        ]);
        $inventorie->update($request->all());

        return Inertia::location(route('inventories'));

        
    }


    public function destroy(string $id)
    {
        Inventory::find($id)->delete();
        return Inertia::location(route('inventories.index'));
    }
}
