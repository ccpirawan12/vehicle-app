<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleSpecification extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicleId',
        'licenseName',
        'type',
        'brand',
        'chassisNumber',
        'engineNumber',
    ];

    public function vehicles(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class,"vehicleId");
    }
}
