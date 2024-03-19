<?php

namespace App\Repositories;

use App\Domain\Car\Car;
use App\Domain\Car\CarRepository;
use App\Http\Controllers\CarSearchCriteria;
use App\Models\Car as EloquentCar;
use App\Services\CarFindCriteria;
use Illuminate\Database\Query\Builder;

class EloquentCarRepository implements CarRepository
{

    public function save(array $fields): void
    {
        EloquentCar::create($fields);
    }

    public function list(CarSearchCriteria $criteria): array
    {
        $query = EloquentCar::select();

        foreach ($criteria->toArray() as $key => $value) {
            if ($value !== null) {
                $query->where($key, $value);
            }
        }

        $dbCars = $query->paginate(10)->items();

        return array_map(fn(EloquentCar $c): Car => Car::fromRawData($c->toArray()), $dbCars);
    }

    public function find(CarFindCriteria $criteria): null|Car
    {
        $query = $this->parseFindCriteria($criteria);

        $data = $query->first();

        return Car::fromRawData($data->toArray());
    }

    public function update(string $id, array $fields): void
    {
        $car = EloquentCar::find($id);
        $car->update($fields);
        $car->save();
    }

    public function delete(string $id): void
    {
        EloquentCar::destroy($id);
    }

    /**
     * @param CarFindCriteria $criteria
     * @return Builder
     */
    private static function parseFindCriteria(CarFindCriteria $criteria): Builder
    {
        $query = EloquentCar::select();

        foreach ($criteria->toArray() as $key => $value) {
            if ($value !== null) {
                $query->where($key, $value);
            }
        }
        return $query;
    }
}
