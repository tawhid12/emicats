<?php

namespace App\Service;

use App\Models\CarModel;
use DB;

class CarModelService
{
    public function store(array $data, $image)
    {
        $car_model = CarModel::create($data);
        if ($image)
            $car_model->addMedia($image)->toMediaCollection();
    }
    public function update(CarModel $car_model, array $data, $image)
    {
        $car_model = tap($car_model)->update($data);
        if ($image)
            $car_model->addMedia($image)->toMediaCollection();
    }
}
