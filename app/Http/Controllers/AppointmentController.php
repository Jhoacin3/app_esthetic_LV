<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Client;
use App\Models\Appointment;
use Inertia\Inertia;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AppointmentController extends Controller
{
    public function __construct() 
{

    // $this->middleware('role:admin|user');
    
    $this->middleware('permission:create-appointment', ['only' => ['create','store']]); 

    $this->middleware('permission:edit-appointment', ['only' => ['edit','update']]);
    
    $this->middleware('permission:delete-appointment', ['only' => ['destroy']]);

}


    public function index()
    {
        $appointments = Appointment::paginate(5);
        return Inertia::render('Appointments', compact('appointments'));
    }

    public function create()
    {
        $services = Service::all();
        $clients = Client::all();

        return Inertia::render('appointments_agregar', ['services' => $services, 'clients' => $clients]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'service_id' => 'required',
            'client_id' => 'required',
        ]);

        $appointment = new Appointment();
        $appointment->service_id = $request->input('service_id');
        $appointment->client_id = $request->input('client_id');
        $appointment->save();

        return redirect()->route('appointments.index');
    }

    public function edit($id)
    {
        $appointment = Appointment::find($id);
        $services = Service::all();
        $clients = Client::all();

        return Inertia::render('appointments_editar', compact('appointment', 'services', 'clients'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'service_id' => 'required',
            'client_id' => 'required',
        ]);

        $appointment = Appointment::find($id);
        $appointment->service_id = $request->input('service_id');
        $appointment->client_id = $request->input('client_id');
        $appointment->save();

        return redirect()->route('appointments.index');
    }

    public function destroy($id)
    {
        Appointment::find($id)->delete();
        return redirect()->route('appointments.index');
    }
}

