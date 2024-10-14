<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
    ];

    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class)->onDelete('cascade');
    }
}
