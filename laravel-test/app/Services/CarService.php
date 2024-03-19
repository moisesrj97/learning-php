<?php

namespace App\Services;

use App\Models\Car;
use App\Models\CarRepository;

class CarService
{
    public function __construct(private readonly CarRepository $repository)
    {
    }

    public function list(): array
    {
        return $this->repository->list();
    }

    public function create(array $rawCar): void
    {
        $this->repository->save($rawCar);
    }

    public function find(string $id): Car|null
    {
        return $this->repository->find($id);
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
