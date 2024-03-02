<?php

namespace App\Service;

use App\Models\Brand;
use DB;

class BrandService
{
    public function store(array $data, $image)
    {
        $brand = Brand::create($data);
        if ($image)
            $brand->addMedia($image)->toMediaCollection();
    }
    public function update(Brand $brand, array $data, $image)
    {
        $brand = tap($brand)->update($data);
        if ($image)
            $brand->addMedia($image)->toMediaCollection();
    }
}
