<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreScheduleRequest;
use App\Models\Schedule;
use App\Http\Resources\V1\ScheduleResource;
use App\Http\Resources\V1\ScheduleCollection;


class ScheduleController extends Controller
{
    //

    public function index()
    {   
        $schedules = Schedule::with('combos')->get();
        return new ScheduleCollection(Schedule::all());
    }

    public function store(StoreScheduleRequest $request)
    {
        $schedule = Schedule::create($request->validated());
        
        
        if ($request->has('combo_id')) {
            
            $comboIds = $request->input('combo_id');
            $schedule->combos()->attach($comboIds);
            
            
            $existingComboIds = $schedule->combos()->pluck('combos.id')->toArray();
            
           
            $deletedComboIds = array_diff($existingComboIds, $comboIds);
            
           
            $schedule->combos()->detach($deletedComboIds);
            
            
            $schedule->combos()->updateExistingPivot($comboIds, ['combo_ids' => $comboIds]);
        }
        
        return response()->json("Servicio agendado correctamente");
    }
       
    public function update(StoreScheduleRequest $request, Schedule $schedule)
    {
        $schedule->update($request->validated());
        // Sincronizar servicios del combo actualizado
        $comboIds = $request->input('combo_id', []);
        if (!empty($scomboIds)) {
            $schedule->combos()->updateExistingPivot($comboIds, ['combo_ids' => implode(',', $comboIds)]);
        }
        $schedule->combos()->sync($comboIds);
        return response()->json("Servicio de la agenda actualizado correctamente");
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
