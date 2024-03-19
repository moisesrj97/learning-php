<?php

namespace App\Services;

use App\Domain\Car\Car;
use App\Domain\Car\CarRepository;
use App\Http\Controllers\CarSearchCriteria;

class CarService
{
    public function __construct(private readonly CarRepository $repository)
    {
    }

    public function list(CarSearchCriteria $criteria): array
    {
        return $this->repository->list($criteria);
    }

    public function create(array $rawCar): void
    {
        $this->repository->save($rawCar);
    }

    public function find(CarFindCriteria $criteria): Car|null
    {
        return $this->repository->find($criteria);
    }

    public function update(string $id, array $fieldsToUpdate): void
    {
        $this->repository->update($id, $fieldsToUpdate);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}
