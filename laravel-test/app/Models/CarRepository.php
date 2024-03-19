<?php

namespace App\Models;

interface CarRepository
{
    public function save(array $fields): void;

    public function list(): array;

    public function find(string $id): Car|null;

    public function update(string $id, array $fields): void;

    public function delete(string $id): void;
}
