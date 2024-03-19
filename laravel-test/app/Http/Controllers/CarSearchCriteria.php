<?php

namespace App\Http\Controllers;

class CarSearchCriteria
{

    public string|null $brand;
    public string|null $model;

    public function __construct()
    {
    }

    public function toArray(): array {
        return [
            "brand" => $this->brand,
            "model" => $this->model
        ];
    }
}
