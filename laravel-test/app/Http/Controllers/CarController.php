<?php

namespace App\Http\Controllers;

use App\Services\CarFindCriteria;
use App\Services\CarService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CarController extends Controller
{

    public function __construct(private readonly CarService $carService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $filter = $request->query("filter");

        $findCriteria = new CarSearchCriteria();
        $findCriteria->brand = $filter["brand"] ?? null;
        $findCriteria->model = $filter["model"] ?? null;

        return response()->json($this->carService->list($findCriteria));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            "brand" => "required|string",
            "model" => "required|string",
            "year" => "required|integer",
            "kms" => "required|integer",
        ]);

        $this->carService->create($data);

        return response()->json([], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $findCriteria = new CarFindCriteria();
        $findCriteria->id = $id;

        $car = $this->carService->find($findCriteria);

        return response()->json($car);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $fieldsToUpdate = $request->validate([
            "brand" => "string",
            "model" => "string",
            "year" => "integer",
            "kms" => "integer",
        ]);

        $this->carService->update($id, $fieldsToUpdate);

        return response()->json([], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $this->carService->delete($id);

        return response()->json([], 204);
    }
}
