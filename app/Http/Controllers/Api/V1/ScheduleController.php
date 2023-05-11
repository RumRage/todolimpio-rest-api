<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreScheduleRequest;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    //

    public function index()
    {
        return response()->json("Agenda Index ok");
    }

    public function store(StoreScheduleRequest $request)
    {
        $schedule = Schedule::create($request->validated());
        // si se proporcionaron servicios en el request
        if ($request->has('combo_id')) {
        // obtener los ids de los servicios
        $comboIds = $request->input('combo_id');
        // agregar la relación many-to-many
        $schedule->combos()->attach($comboIds);
        }
        return response()->json("Servicio agendado creado correctamente");
    }
}
