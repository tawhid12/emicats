<?php

namespace App\Http\Controllers;

use App\Constants\Role;
use App\Http\Requests\CarModel\StoreCarModelRequest;
use App\Models\CarModel;
use App\Models\User;
use App\Service\CarModelService;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $car_models = CarModel::paginate(10);
        return view("car_models.index", compact("car_models"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("car_models.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarModelRequest $request,  CarModelService $CarModelService)
    {
        try {
            //dd($request->all());
            $CarModelService->store($request->validated(), $request->hasFile('image') ? $request->file('image') : null);
            //throw new \Exception('offer not created');
            return redirect()->back()->with(['success' => 'Car Model Created']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Something Went Wrong']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view('brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //$this->authorize('update', $offer);
        return view('brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBrandRequest $request, User $user, Brand $brand, BrandService $brandService)
    {
        try {
            //dd($request->all());
            //$this->authorize('update', $brand);
            //return $user->role === Role::ADMIN || ($user->role === Role::USER   && $user->id === $brand->author_id);
            $brandService->update($brand, $request->validated(), $request->hasFile('image') ? $request->file('image') : null);
            //throw new \Exception('offer not created');
            return redirect()->back()->with(['success' => 'Brand Updated']);
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
