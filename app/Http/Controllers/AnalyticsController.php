<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farmer;
use App\Models\MessageLog;

class AnalyticsController extends Controller
{
    public function index()
    {
        try {
            $farmersByType = Farmer::select('farming_type')
                ->selectRaw('count(*) as count')
                ->groupBy('farming_type')
                ->get();

            $messagesByMonth = MessageLog::selectRaw('MONTH(created_at) as month')
                ->selectRaw('count(*) as count')
                ->whereYear('created_at', now()->year)
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            // Fill in missing months with zero counts
            $messagesData = array_fill(1, 12, 0);
            foreach ($messagesByMonth as $message) {
                $messagesData[$message->month] = $message->count;
            }

            return view('admin.analytics', [
                'farmersByType' => $farmersByType,
                'messagesByMonth' => $messagesData
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error generating analytics: ' . $e->getMessage());
        }
    }
}