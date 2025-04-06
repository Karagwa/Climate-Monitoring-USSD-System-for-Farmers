<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Farmer;
use App\Models\MessageLog;

class AnalyticsController extends Controller
{
 // app/Http/Controllers/AnalyticsController.php
public function index()
{
    $farmersByType = Farmer::select('farming_type')
                        ->selectRaw('count(*) as count')
                        ->groupBy('farming_type')
                        ->get();

    $messagesByMonth = MessageLog::selectRaw('MONTH(created_at) as month')
                            ->selectRaw('count(*) as count')
                            ->groupBy('month')
                            ->get();

    return view('admin.analytics', compact('farmersByType', 'messagesByMonth'));
}
}
