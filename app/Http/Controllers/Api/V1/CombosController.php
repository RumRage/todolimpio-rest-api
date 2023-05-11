<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreComboRequest;
use App\Models\Combo;


class CombosController extends Controller
{
    //

    public function index()
    {
        return response()->json("Combos Index ok");
    }

    public function store(StoreComboRequest $request)
    {
        Combo::create($request->validated());
        return response()->json("Combo creado correctamente");
    }

    public function update(StoreComboRequest $request, Combo $combo)
    {
        $combo->update($request->validated());
        return response()->json("Combo actualizado correctamente");
    }

    

}
