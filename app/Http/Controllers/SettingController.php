<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        return view("setting.index", compact("setting"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        return view('setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        try {
            $setting->update([
                'pt' => $request->pt,
                'pt_value' => $request->pt_value,
                'pt_per' => $request->pt_per,
                'pd' => $request->pd,
                'pd_value' => $request->pd_value,
                'pd_per' => $request->pd_per,
                'rh' => $request->rh,
                'rh_value' => $request->rh_value,
                'rh_per' => $request->rh_per,
                'exchange_rate' => $request->exchange_rate,
            ]);
            return redirect()->route('setting.index')->with(['success' => 'Setting Updated']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Something Went Wrong']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
