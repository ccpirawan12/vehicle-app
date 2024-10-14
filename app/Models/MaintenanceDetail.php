<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class MaintenanceDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'workshop',
        'nextMaintenance',
        'maintenance_id',
    ];

    public function maintenances(): BelongsTo
    {
        return $this->belongsTo(Maintenance::class,"maintenance_id");
    }
}
