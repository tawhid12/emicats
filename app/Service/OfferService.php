<?php

namespace App\Service;

use App\Models\Offer;
use DB;

class OfferService
{
    public function store(array $data, $image)
    {
        DB::transaction(function () use ($data, $image) {
            $data = array_merge(
                ['author_id' => auth()->user()->id],
                $data
            );
            $offer = Offer::create($data);
            $offer->categories()->sync($data['categories']);
            $offer->locations()->sync($data['locations']);
            if ($image)
                $offer->addMedia($image)->toMediaCollection();
        }, 5);
    }
    public function update(Offer $offer, array $data, $image)
    {
        DB::transaction(function () use ($offer, $data, $image) {
            $data = array_merge(
                ['author_id' => auth()->user()->id],
                $data
            );
            $offer = tap(Offer::update($data));
            $offer->categories()->sync($data['categories']);
            $offer->locations()->sync($data['locations']);
            if ($image)
                $offer->addMedia($image)->toMediaCollection();
        }, 5);
    }
}
