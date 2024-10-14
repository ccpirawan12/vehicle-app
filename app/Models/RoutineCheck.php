<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoutineCheck extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'vehicleId',
        'checkDate',
        'status',
    ];

    public function vehicles(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class,"vehicleId");
    }
}
