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
        
        // si se proporcionaron servicios en el request
        if ($request->has('service_id')) {
            // obtener los ids de los servicios
            $serviceIds = $request->input('service_id');
            // agregar la relación many-to-many
            $combo->services()->attach($serviceIds);
        }
        
        return response()->json("Combo creado correctamente");
    }
    

    public function update(StoreComboRequest $request, Combo $combo)
    {
        $combo->update($request->validated());

        // Sincronizar servicios del combo actualizado
        $combo->services()->sync($request->input('service_id', []));

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
