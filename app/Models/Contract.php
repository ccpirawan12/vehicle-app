<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'contractDate',
        'contractEnd',
        'file',
        'ownerId',
        'vehicleId',
    ];

    public function owners(): BelongsTo
    {
        return $this->belongsTo(Owner::class,"ownerId");
    }

    public function vehicles(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class,"vehicleId");
    }
}
