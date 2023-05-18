<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreComboRequest;
use App\Models\Combo;
use App\Http\Resources\V1\ComboResource;
use App\Http\Resources\V1\ComboCollection;


class ComboController extends Controller
{
    //

    public function index()
    {
        $combos = Combo::with('services')->get();
        return new ComboCollection(Combo::all());
    }

    public function store(StoreComboRequest $request)
    {
        $combo = Combo::create($request->validated());
        
        // Si se proporcionaron servicios en el request
        if ($request->has('service_id')) {
            // Obtener los IDs de los servicios como un array
            $serviceIds = $request->input('service_id');
            
            // Agregar la relación many-to-many
            $combo->services()->attach($serviceIds);
            
            // Obtener los IDs de los servicios existentes en la tabla pivot
            $existingServiceIds = $combo->services()->pluck('services.id')->toArray();
            
            // Calcular los IDs de los servicios que se eliminaron
            $deletedServiceIds = array_diff($existingServiceIds, $serviceIds);
            
            // Eliminar las filas correspondientes a los servicios eliminados
            $combo->services()->detach($deletedServiceIds);
            
            // Guardar los IDs de los servicios como un array en la nueva columna
            $combo->services()->updateExistingPivot($serviceIds, ['service_ids' => $serviceIds]);
        }
        
        return response()->json("Combo creado correctamente");
    }
    

public function update(StoreComboRequest $request, Combo $combo)
{
    $combo->update($request->validated());

    // Obtener los ids de los servicios seleccionados
    $serviceIds = $request->input('service_id', []);
    
    // Actualizar los ids de los servicios en la tabla pivote
    if (!empty($serviceIds)) {
        $combo->services()->updateExistingPivot($serviceIds, ['service_ids' => implode(',', $serviceIds)]);
    }

    // Sincronizar servicios del combo actualizado
    $combo->services()->sync($serviceIds);

    return response()->json("Combo actualizado correctamente");
}

    public function show(Combo $combo)
    {
        $combo->load('services');
        return new ComboResource($combo);
    }

    public function destroy(Combo $combo)
    {
        $combo->delete();
        return response()->json("Combo eliminado correctamente");
    }
    

}
