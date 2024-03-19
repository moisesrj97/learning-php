<?php

namespace App\Domain\Car;

class Car
{
    public string $id;
    public string $brand;
    public string $model;
    public int $year;
    public int $kms;

    /**
     * @param string $id
     * @param string $brand
     * @param string $model
     * @param int $year
     * @param int $kms
     */
    public function __construct(string $id, string $brand, string $model, int $year, int $kms)
    {
        $this->id = $id;
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->kms = $kms;
    }


    static public function fromRawData(array $data): self {
        return new Car(
            $data["id"],
            $data["brand"],
            $data["model"],
            $data["year"],
            $data["kms"]
        );
    }

}
