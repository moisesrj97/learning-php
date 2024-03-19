<?php

namespace App\Domain\Car;

use App\Http\Controllers\CarSearchCriteria;
use App\Services\CarFindCriteria;

interface CarRepository
{
    public function save(array $fields): void;

    public function list(CarSearchCriteria $criteria): array;

    public function find(CarFindCriteria $criteria): Car|null;

    public function update(string $id, array $fields): void;

    public function delete(string $id): void;
}
