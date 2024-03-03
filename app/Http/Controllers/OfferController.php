<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Http\Requests\StoreOfferRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\Offer;
use App\Models\User;
use App\Service\OfferService;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */0
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('title', 'asc')->get();
        $locations = Location::orderBy('title', 'asc')->get();
        return view("add-offer", compact('categories', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfferRequest $request, OfferService $offerService)
    {
        try {
            //dd($request->all());
            $this->authorize('create', Offer::class);
            $offerService->store($request->validated(), $request->hasFile('image') ? $request->file('image') : null);
            //throw new \Exception('offer not created');
            return redirect()->back()->with(['success' => 'Offer Created']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Something Went Wrong']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        return view('show-offer', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        $this->authorize('update', $offer);
        $categories = Category::orderBy('title', 'asc')->get();
        $locations = Location::orderBy('title', 'asc')->get();
        return view("edit-offer", compact('offer', 'categories', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreOfferRequest $request, Offer $offer, OfferService $offerService)
    {

        try {
            //dd($request->all());
            $this->authorize('update', $offer);
            $offerService->update($offer, $request->validated(), $request->hasFile('image') ? $request->file('image') : null);
            //throw new \Exception('offer not created');
            return redirect()->back()->with(['success' => 'Offer Created']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Something Went Wrong']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
