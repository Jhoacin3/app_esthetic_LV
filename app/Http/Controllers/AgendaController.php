<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;


class AgendaController extends Controller
{
    //NOTA: Constructor te permite realizar tareas de inicialización y configuración comunes para todas las acciones del controlador
    function __construct()
    {
        $this->middleware('permission: ver-agenda | crear-agenda | editar-agenda | borrar-agenda')->only('index');
        $this->middleware('permission: crear-agenda', ['only' => ['create', 'store']]);
        $this->middleware('permission: editar-agenda', ['only' => ['edit', 'update']]);
        $this->middleware('permission: borrar-agenda', ['only' => ['destroy']]);
    }

    public function index()
    {
        $agendas = Agenda::paginate(5);
        // Renderiza la vista utilizando Inertia y pasa la colección de inventarios
        return Inertia::render('agendas', ['agendas' => $agendas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Renderiza la vista utilizando Inertia
        return Inertia::render('agendas_agregar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'fullName' => 'required',
            'service' => 'required',
            'day' => 'required',
            'hour' => 'required',
        ]);
        Agenda::create($request->all());

        return Inertia::location(route('agendas.index'));
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agenda $agenda)
    {
        return Inertia::render('agendas_editar', [
            //verificar
            'agenda' => $agenda,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agenda $agenda)
    {
        request()->validate([
            'fullName' => 'required',
            'service' => 'required',
            'day' => 'required',
            'hour' => 'required',
        ]);
        $agenda->update($request->all());

        return Inertia::location(route('agendas.index'));
    }

    // ANALIZAR LA VARIABLE agend*******************
    public function destroy(Agenda $agend)
    {
        $agend->delete();
        return Inertia::location(route('inventories.index'));
    }
}
