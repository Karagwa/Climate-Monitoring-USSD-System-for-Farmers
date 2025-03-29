<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function farmer_registration(){
        return view('layouts.farmerregistration');
    }
}
