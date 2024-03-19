<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Car::query()->orderBy("updated_at", "desc")->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "brand" => "required|string",
            "model" => "required|string",
            "year" => "required|integer",
            "kms" => "required|integer",
        ]);

        Car::create($data);

        return response()->json([], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::find($id);

        return response($car);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            "brand" => "string",
            "model" => "string",
            "year" => "integer",
            "kms" => "integer",
        ]);

        $car = Car::find($id);
        $car->update($data);
        $car->save();

        return response()->json([], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::destroy($id);

        return response()->json([], 204);
    }
}
