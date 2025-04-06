<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farmer;

class AdminController extends Controller
{
    public function create(){
        return view('admin.farmer-registration');
    }
  


    public function index(Request $request)
{
    // Handle POST request (form submission)
    if ($request->isMethod('post')) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'location' => 'required|string|max:255',
            'national_id' => 'required|string|max:50',
            'farming_type' => 'required|string',
        ]);

        Farmer::create($validated);

        return redirect()->route('admin.farmers')
            ->with('success', 'Farmer uploaded successfully!');
    }

    // Handle GET request (normal page load)
    $farmers = Farmer::all();
    return view('layouts.registered', compact('farmers'));
}

}

