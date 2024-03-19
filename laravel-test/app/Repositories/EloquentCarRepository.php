<?php

namespace App\Repositories;

use App\Models\Car;
use App\Models\CarRepository;

class EloquentCarRepository implements CarRepository
{

    public function save(array $fields): void
    {
        Car::create($fields);
    }

    public function list(): array
    {
        return Car::query()->orderBy("updated_at", "desc")->paginate(10)->items();
    }

    public function find(string $id): Car|null
    {
        return Car::find($id);
    }

    public function update(string $id, array $fields): void
    {
        $car = Car::find($id);
        $car->update($fields);
        $car->save();
    }

    public function delete(string $id): void
    {
        Car::destroy($id);
    }
}
