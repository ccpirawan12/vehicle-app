<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class AdministrationsDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'administrativeCategory',
        'nextAdministration',
        'administrationId',
    ];

    public function administrations(): BelongsTo
    {
        return $this->belongsTo(Administration::class,"maintenance_id");
    }
}
