<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'location', 'national_id', 'farming_type'];
}
// In Farmer.php add relationships:
 function messageLogs()
{
    return $this->hasMany(MessageLog::class);
}

// Add validation rules that match controller:
 static $rules = [
    'name' => 'required|string|max:255',
    'phone' => 'required|string|max:15|unique:farmers',
    'location' => 'required|string|max:255',
    'national_id' => 'required|string|max:20|unique:farmers',
    'farming_type' => 'required|in:crop,livestock,mixed'
];
?>