<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PestScan extends Model
{
    use HasFactory;
    
    const UPDATED_AT = null;

    protected $fillable = [
        'customer_id',
        'image_url',
        'pest_name',
        'scan_timestamp',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
