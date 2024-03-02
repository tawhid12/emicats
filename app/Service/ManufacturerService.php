<?php

namespace App\Service;

use App\Models\Manufacturer;
use DB;

class ManufacturerService
{
    public function store(array $data, $image)
    {
        $car_model = Manufacturer::create($data);
    }
    public function update(Manufacturer $car_model, array $data, $image)
    {
        $car_model = tap($car_model)->update($data);
    }
}
