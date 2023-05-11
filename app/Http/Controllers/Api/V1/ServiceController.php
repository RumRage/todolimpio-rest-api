<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreServiceRequest;
use App\Models\Service;
use App\Http\Resources\V1\ServiceResource;
use App\Http\Resources\V1\ServiceCollection;


class ServiceController extends Controller
{
    //

    public function index()
    {
        return new ServiceCollection(Service::all());
    }

    public function store(StoreServiceRequest $request)
    {
        Service::create($request->validated());
        return response()->json("Servicio creado correctamente");
    }

    public function update(StoreServiceRequest $request, Service $service)
    {
        $service->update($request->validated());
        return response()->json("Servicio actualizado correctamente");
    }

    public function show(Service $service)
    {
        return new ServiceResource($service);
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return response()->json("Servicio eliminado correctamente");
    }

}
