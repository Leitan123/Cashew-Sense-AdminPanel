<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionRequest extends Model
{
    use HasFactory;

    protected $fillable = ['farm_owner_id', 'subscription_id', 'status'];

    public function farmOwner()
    {
        return $this->belongsTo(FarmOwner::class);
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
