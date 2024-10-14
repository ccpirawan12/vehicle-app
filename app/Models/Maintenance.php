<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicleId',
        'maintenanceDate',
        'description',
        'cost',
    ];

    public function maintenance_details(): HasOne
    {
        return $this->hasOne(MaintenanceDetail::class,"maintenance_id");
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class,"vehicleId");
    }
}
