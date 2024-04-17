<?php

namespace App\Http\Controllers;

use App\Constants\Role;
use App\Http\Requests\Product\StoreProductRequest;
use App\Models\Product;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Manufacturer;
use App\Models\Component;
use App\Models\Setting;
use App\Models\User;
use App\Service\ProductService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $setting = Setting::first();
        if ($request->search) {
            $products = Product::with(['brands', 'carmodels', 'components', 'manufacturer'])->where('ref', 'like', "%$request->search%")
                ->orWhere('ref1', 'like', "%$request->search%")
                ->orWhere('ref2', 'like', "%$request->search%")->whereNull('deleted_at')->paginate(10);
        } else {
            $products = Product::with(['brands', 'carmodels', 'components', 'manufacturer'])->whereNull('deleted_at')->paginate(10);
        }

        return view("products.index", compact("products", "setting"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::orderBy('b_name', 'asc')->get();
        $carmodels = CarModel::orderBy('model_name', 'asc')->get();
        $manufacturers = Manufacturer::orderBy('manu_name', 'asc')->get();
        $components = Component::orderBy('c_name', 'asc')->get();
        return view("products.create", compact("brands", "carmodels", "manufacturers", "components"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request,  ProductService $ProductService)
    {
        try {
            $product = new Product;
            $product->title = $request->title;
            $product->ref = $request->ref;
            $product->ref1 = $request->ref1;
            $product->ref2 = $request->ref2;
            $product->description = $request->description;
            $product->weight = $request->weight;
            $product->pt = $request->pt;
            $product->pd = $request->pd;
            $product->rh = $request->rh;
            $product->years = $request->years ? implode(',', $request->years) : null;
            $product->save();
            // Check if images are present in the request
            if ($request->hasFile('image')) {
                // Loop through each uploaded image
                foreach ($request->file('image') as $image) {
                    // Add each image to the media collection
                    $product->addMedia($image)->toMediaCollection();
                }
            }
            $product->brands()->sync($request->brands);
            $product->carmodels()->sync($request->carmodels);
            //$ProductService->store($request->validated(), $request->hasFile('image') ? $request->file('image') : null);
            //throw new \Exception('offer not created');
            return redirect()->back()->with(['success' => 'Product Created']);
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
    public function edit(Product $product)
    {
        //$this->authorize('update', $offer);
        $brands = Brand::orderBy('b_name', 'asc')->get();
        $carmodels = CarModel::orderBy('model_name', 'asc')->get();
        $manufacturers = Manufacturer::orderBy('manu_name', 'asc')->get();
        $components = Component::orderBy('c_name', 'asc')->get();
        return view('products.edit', compact('product', "brands", "carmodels", "manufacturers", "components"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        try {
            $product->update([
                'title' => $request->title,
                'ref' => $request->ref,
                'ref1' => $request->ref1,
                'ref2' => $request->ref2,
                'description' => $request->description,
                'weight' => $request->weight,
                'pt' => $request->pt,
                'pd' => $request->pd,
                'rh' => $request->rh,
                'years' => $request->years ? implode(',', $request->years) : null
            ]);
            // Check if images are present in the request
            if ($request->hasFile('image')) {
                // Loop through each uploaded image
                foreach ($request->file('image') as $image) {
                    // Add each image to the media collection
                    $product->addMedia($image)->toMediaCollection();
                }
            }
            $product->brands()->sync($request->brands);
            $product->carmodels()->sync($request->carmodels);
            return redirect()->route('product.index')->with(['success' => 'Product Updated']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Something Went Wrong']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->deleted_at = Carbon::now();
        $product->update();
        return redirect()->back()->with(['success' => 'Product Deleted']);
    }
}
