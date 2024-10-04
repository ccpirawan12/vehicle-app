<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        return $this->belongsTo(Owner::class);
    }

    public function locations(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
