<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Service;



class ServiceController extends Controller
{
     //NOTA: Constructor te permite realizar tareas de inicialización y configuración comunes para todas las acciones del controlador
     function __construct()
     {
         $this->middleware('permission: ver-services | crear-services | editar-services | borrar-services')->only('index');
         $this->middleware('permission: crear-services', ['only' => ['create', 'store']]);  
         $this->middleware('permission: editar-services', ['only' => ['edit', 'update']]);
         $this->middleware('permission: borrar-services', ['only' => ['destroy']]);
     }
    
    public function index()
    {
        $services = Service::paginate(5);
        // Renderiza la vista utilizando Inertia y pasa la colección de inventarios
        return Inertia::render('services', ['services' => $services]);
    }

    
    public function create()
    {
        // Renderiza la vista utilizando Inertia
        return Inertia::render('services_agregar');
    }

    //para el boton de guardar en crear...
    public function store(Request $request)
    {
        request()->validate([
            'name' =>'required',
            'description' =>'required',
            'price' =>'required',
        ]);
        Service::create($request->all());

        return Inertia::location(route('services'));
    }

    
    // public function show(string $id)
    // {
    //     //
    // }

    
    public function edit(Service $service)
    {
        return Inertia::render('services_editar', [
            //verificar
            'service' => $service,
        ]);
    }

    
    public function update(Request $request, Service $service)
    {
        request()->validate([
            'name' =>'required',
            'description' =>'required',
            'price' =>'required',
        ]);
        $service->update($request->all());

        return Inertia::location(route('services_agregar'));

        
    }

   
    public function destroy(string $id)
    {
        Service::find($id)->delete();
        return Inertia::location(route('services'));
    }
}
