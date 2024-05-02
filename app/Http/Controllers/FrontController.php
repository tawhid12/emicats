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
        $keywords = explode(' ', $request->keyword);
        $productsQuery = Product::where(function ($query) use ($keywords) {
            foreach ($keywords as $keyword) {
                $query->where(function ($query) use ($keyword) {
                    $query->where('ref', 'like', "%$keyword%")
                        ->orWhere('ref1', 'like', "%$keyword%")
                        ->orWhere('ref2', 'like', "%$keyword%");
                });
            }
        })->whereNull('deleted_at');
        if ($request->keyword) {
            $keywords = explode(' ', $request->keyword);
            $productsQuery->where(function ($query) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $query->where(function ($query) use ($keyword) {
                        $query->where('ref', 'like', "%$keyword%")
                            ->orWhere('ref1', 'like', "%$keyword%")
                            ->orWhere('ref2', 'like', "%$keyword%");
                    });
                }
            });
            $products = $productsQuery->paginate(10);
        } else {
            $products = Product::whereNull('deleted_at')->paginate(10);
        }
        return view('welcome', compact('setting', 'products'));
    }
}
