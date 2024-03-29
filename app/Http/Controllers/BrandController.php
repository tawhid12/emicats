<?php

namespace App\Http\Controllers;

use App\Constants\Role;
use App\Http\Requests\Brand\StoreBrandRequest;
use App\Models\Brand;
use App\Models\User;
use App\Service\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $brands = Brand::paginate(10);
        return view("brands.index", compact("brands"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("brands.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request,  BrandService $brandService)
    {
        try {
            //dd($request->all());
            $brandService->store($request->validated(), $request->hasFile('image') ? $request->file('image') : null);
            //throw new \Exception('offer not created');
            return redirect()->back()->with(['success' => 'Brand Created']);
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
