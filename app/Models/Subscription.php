<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Subscription extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'subscriptions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'plan',
        'start_date',
        'end_date',
        'status',
        'duration',
        'payment_id',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * Get the user that owns the subscription.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
    public static function cancel(Subscription $subscription)
    {
        $subscriptions = self::where('user_id', $subscription->user_id)
            ->where('plan', $subscription->plan)
            ->where('status', 'Active')
            ->get();

        foreach ($subscriptions as $sub) {
            $sub->status = 'Cancelled';
            $sub->end_date = Carbon::now()->setTimezone('Asia/Singapore')->startOfDay();
            $sub->save();
        }
    }
}
