<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Setting;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $setting = Setting::first();
        if ($request->keyword) {
            $products = Product::where('ref', 'like', "%$keyword%")
                ->orWhere('ref1', 'like', "%$request->keyword%")
                ->orWhere('ref2', 'like', "%$request->keyword%")
                ->get();
        } else {
            $products = Product::all();
        }
        return view('welcome', compact('setting', 'products'));
    }
}
