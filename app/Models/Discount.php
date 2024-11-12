<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = ['plan', 'discount_price', 'daysLeft', 'subscription_id'];
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
