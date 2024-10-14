<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Administration extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicleId',
        'administrationDate',
        'description',
        'cost',
    ];

    public function administration_details(): HasOne
    {
        return $this->hasOne(AdministrationDetail::class,"administrationId");
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class,"vehicleId");
    }
}
