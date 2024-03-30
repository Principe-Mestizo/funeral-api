<?php

namespace App\Http\Controllers;

use App\Http\Requests\V1\VentaRequest;
use App\Models\Venta;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VentaController extends Controller
{
    public function index(): JsonResponse
    {
        $ventas = Venta::latest()->get();

        return response()->json($ventas, Response::HTTP_OK);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(VentaRequest $request): JsonResponse
    {
        $ventas = Venta::create($request->validated());
        return response()->json($ventas, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $ventas = Venta::findOrFail($id);
        return response()->json($ventas, Response::HTTP_OK);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(VentaRequest $request, string $id): JsonResponse
    {
        $venta = Venta::findOrFail($id);
        $venta->update($request->validated());
        return response()->json($venta, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();
        return response()->json($venta, Response::HTTP_NO_CONTENT);
    }
}
