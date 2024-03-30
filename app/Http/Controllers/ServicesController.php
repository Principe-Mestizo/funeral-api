<?php

namespace App\Http\Controllers;

use App\Http\Requests\V1\SaveServiceRequest;
use App\Models\Services;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $services = Services::latest()->get();

        return response()->json($services, Response::HTTP_OK);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveServiceRequest $request): JsonResponse
    {
        $service = Services::create($request->validated());
        return response()->json($service, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $service = Services::findOrFail($id);
        return response()->json($service, Response::HTTP_OK);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(SaveServiceRequest $request, string $id): JsonResponse
    {
        $service = Services::findOrFail($id);
        $service->update($request->validated());
        return response()->json($service, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $service = Services::findOrFail($id);
        $service->delete();
        return response()->json($service, Response::HTTP_NO_CONTENT);
    }

    public function getTotal(): JsonResponse
    {
        $totalServices = DB::table('services')->count();
        return response()->json(['total_services' => $totalServices], Response::HTTP_OK);
    }

    public function getTotalUsers(): JsonResponse
    {
        $users = DB::table('users')->count();
        return response()->json(['users' => $users], Response::HTTP_OK);
    }

    public function getTotalSolicitudes(): JsonResponse
    {
        $formularios = DB::table('formularios')->count();
        return response()->json(['formularios' => $formularios], Response::HTTP_OK);
    }
}
