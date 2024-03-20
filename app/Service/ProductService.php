<?php

namespace App\Service;

use App\Models\Product;
use DB;

class ProductService
{
    public function store(array $data, $image)
    {
        /*$data = array_merge(
            ['years' => implode(',', $data['years'])],
            $data
        );
        print_r($data);
        die;*/
        DB::transaction(
            function () use ($data, $image) {
                $product = Product::create($data);
                $product->brands()->sync($data['brands']);
                $product->carmodels()->sync($data['carmodels']);
                if ($image)
                    $product->addMedia($image)->toMediaCollection();
            },
            5
        );
    }
    public function update(Product $product, array $data, $image)
    {
        $product = tap($product)->update($data);
        if ($image)
            $product->addMedia($image)->toMediaCollection();
    }
}
