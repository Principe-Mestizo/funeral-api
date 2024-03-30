<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductosRequest;
use App\Models\Products;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class ProductsController extends Controller
{
    public function index(): JsonResponse
    {
        $productos = Products::latest()->get();

        return response()->json($productos, Response::HTTP_OK);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductosRequest $request): JsonResponse
    {
        $productos = Products::create($request->validated());
        return response()->json($productos, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $productos = Products::findOrFail($id);
        return response()->json($productos, Response::HTTP_OK);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ProductosRequest $request, string $id): JsonResponse
    {
        $productos = Products::findOrFail($id);
        $productos->update($request->validated());
        return response()->json($productos, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $productos = Products::findOrFail($id);
        $productos->delete();
        return response()->json($productos, Response::HTTP_NO_CONTENT);
    }
}
