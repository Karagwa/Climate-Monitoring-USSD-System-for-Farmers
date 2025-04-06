<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farmer;

class AdminController extends Controller
{
    public function farmerRegistration(){
        return view('admin.farmer-registration');
    }
    public function storeFarmer(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15|unique:farmers,phone',
            'location' => 'required|string|max:255',
            'national_id' => 'required|string|max:20|unique:farmers,national_id',
            'farming_type' => 'required|string|in:crop,livestock,mixed',
        ]);

      

        
        Farmer::create($validated);
        return redirect()->route('admin.farmers')
        ->with('success', 'Farmer registered successfully!');

    }

    public function showFarmers()
{
    $farmers = Farmer::latest()->get(); // Get farmers in reverse chronological order
    return view('layouts.registered', compact('farmers'));
}

}

