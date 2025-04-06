<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MessageLog;

class MessageLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // In your USSD controller or service
MessageLog::create([
    'farmer_id' => $farmer->id,
    'content' => $messageContent,
    'status' => 'sent',
    'channel' => 'USSD'
]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
