<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    const UPDATED_AT = null;

    protected $fillable = [
        'name',
        'phone',
        'pin_hash',
        'district',
        'farm_size',
    ];

    public function leafScans()
    {
        return $this->hasMany(LeafScan::class);
    }

    public function pestScans()
    {
        return $this->hasMany(PestScan::class);
    }
}
