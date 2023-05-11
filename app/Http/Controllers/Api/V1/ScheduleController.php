<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreScheduleRequest;
use App\Models\Schedule;
use App\Http\Resources\V1\ScheduleResource;
use App\Http\Resources\V1\ComboResource;
use App\Http\Resources\V1\ScheduleCollection;


class ScheduleController extends Controller
{
    //

    public function index()
    {
        return new ScheduleCollection(Schedule::all());
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

    public function update(StoreScheduleRequest $request, Schedule $schedule)
    {
        $schedule->update($request->validated());
        // Sincronizar servicios del combo actualizado
        $schedule->combos()->sync($request->input('combo_ids', []));
        return response()->json("Servicio actualizado correctamente");
    }

    public function show(Schedule $schedule)
    {
        $schedule->load('combos');
        return new ScheduleResource($schedule);
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return response()->json("Servicio eliminado correctamente de la agenda");
    }
}
