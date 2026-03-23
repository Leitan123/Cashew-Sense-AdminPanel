<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NutScan extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'scan_timestamp',
        'predicted_class',
        'weight',
        'final_grade',
        'image_url',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
