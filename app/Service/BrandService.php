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
    public function update(brand $offer, array $data, $image)
    {
        /*DB::transaction(function () use ($offer, $data, $image) {
            $data = array_merge(
                ['author_id' => auth()->user()->id],
                $data
            );
            $offer = tap(Offer::update($data));
            $offer->categories()->sync($data['categories']);
            $offer->locations()->sync($data['locations']);
            if ($image)
                $offer->addMedia($image)->toMediaCollection();
        }, 5);*/
    }
}
