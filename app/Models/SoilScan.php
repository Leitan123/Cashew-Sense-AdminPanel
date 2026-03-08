<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoilScan extends Model
{
    protected $fillable = [
        'customer_id',
        'moisture',
        'temperature',
        'ec',
        'ph',
        'nitrogen',
        'phosphorus',
        'potassium',
        'soil_score',
        'image_url',
        'scan_timestamp'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
