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
        $products = Product::all();
        return view('welcome', compact('setting', 'products'));
    }
}
