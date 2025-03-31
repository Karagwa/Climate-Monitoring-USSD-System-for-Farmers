<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farmer;

class AdminController extends Controller
{
    public function farmer_registration(){
        return view('layouts.farmerregistration');
    }
    public function storeFarmer(Request $request)
    {
        // Validate form inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'location' => 'required|string|max:255',
            'national_id' => 'required|string|max:20|unique:farmers,national_id',
            'farming_type' => 'required|string',
        ]);

        // Save the farmer data to the database
        Farmer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'location' => $request->location,
            'national_id' => $request->national_id,
            'farming_type' => $request->farming_type,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Farmer added successfully!');
    }
}

