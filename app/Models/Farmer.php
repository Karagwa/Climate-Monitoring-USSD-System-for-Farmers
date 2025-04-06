<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'location', 'national_id', 'farming_type'];
}
 function messageLogs()
{
    return $this->hasMany(MessageLog::class);
}
?>