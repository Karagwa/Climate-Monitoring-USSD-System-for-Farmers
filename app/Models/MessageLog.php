<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageLog extends Model
{
     protected $fillable = [
        'farmer_id',
        'content',
        'status',
        'channel'
    ];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }
}