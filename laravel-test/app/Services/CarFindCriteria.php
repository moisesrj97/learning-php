<?php

namespace App\Services;

class CarFindCriteria
{
    public string $id;

    public function toArray(): array{
        return [
            "id" => $this->id,
        ];
    }
}
