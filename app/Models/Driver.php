<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'licenseNumber',
        'phone',
        'vehicleId',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class,"userId");
    }

    public function vehicles(): HasOne
    {
        return $this->hasOne(Vehicle::class,"id");
    }
}
