<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'licensePlate',
        'model',
        'year',
        'status',
        'owner_id',
        'location_id',
    ];

    public function owners(): BelongsTo
    {
        return $this->belongsTo(Owner::class,"owner_id");
    }

    public function locations(): BelongsTo
    {
        return $this->belongsTo(Location::class,"location_id");
    }

    public function vehicle_specifications(): HasOne
    {
        return $this->hasOne(VehicleSpecification::class)->onDelete('cascade');
    }

    public function drivers(): HasMany
    {
        return $this->hasMany(Driver::class,"vehicleId")->onDelete('cascade');
    }

    public function routine_checks(): HasMany
    {
        return $this->hasMany(RoutineCheck::class,"vehicleId");
    }

    public function maintenances(): HasMany
    {
        return $this->hasMany(Maintenance::class,"vehicleId");
    }
}
