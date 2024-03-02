<?php

namespace App\Service;

use App\Models\Product;
use DB;

class ProductService
{
    public function store(array $data, $image)
    {
        $product = Product::create($data);
        if ($image)
            $product->addMedia($image)->toMediaCollection();
    }
    public function update(Product $product, array $data, $image)
    {
        $product = tap($product)->update($data);
        if ($image)
            $product->addMedia($image)->toMediaCollection();
    }
}
