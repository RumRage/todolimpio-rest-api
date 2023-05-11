<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreServiceRequest;
use App\Models\Service;

class ServiceController extends Controller
{
    //

    public function index()
    {
        return response()->json("Servicios Index ok");
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

}
