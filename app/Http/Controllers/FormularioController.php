<?php

namespace App\Http\Controllers;

use App\Http\Requests\V1\FormularioRequest;
use App\Models\Formulario;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FormularioController extends Controller
{
    public function index(): JsonResponse
    {
        $formulario = Formulario::latest()->get();

        return response()->json($formulario, Response::HTTP_OK);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(FormularioRequest $request): JsonResponse
    {
        $formulario = Formulario::create($request->validated());
        return response()->json($formulario, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $formulario = Formulario::findOrFail($id);
        return response()->json($formulario, Response::HTTP_OK);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(FormularioRequest $request, string $id): JsonResponse
    {
        $formulario = Formulario::findOrFail($id);
        $formulario->update($request->validated());
        return response()->json($formulario, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $formulario = Formulario::findOrFail($id);
        $formulario->delete();
        return response()->json($formulario, Response::HTTP_NO_CONTENT);
    }
}
