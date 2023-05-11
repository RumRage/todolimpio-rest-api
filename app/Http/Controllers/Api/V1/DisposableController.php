<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDisposableRequest;
use App\Models\Disposable;
use App\Http\Resources\V1\DisposableResource;
use App\Http\Resources\V1\DisposableCollection;

class DisposableController extends Controller
{
    //

    public function index()
    {
        return new DisposableCollection(Disposable::all());
    }

    public function store(StoreDisposableRequest $request)
    {
        Disposable::create($request->validated());
        return response()->json("Descartable creado correctamente");
    }

    public function update(StoreDisposableRequest $request, Disposable $disposable)
    {
        $disposable->update($request->validated());
        return response()->json("Descartable actualizado correctamente");
    }

    public function show(Disposable $disposable)
    {
        return new DisposableResource($disposable);
    }

    public function destroy(Disposable $disposable)
    {
        $disposable->delete();
        return response()->json("Descartable eliminado correctamente");
    }

}
