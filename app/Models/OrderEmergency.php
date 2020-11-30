<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderEmergency extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'emergency_id',
        'amount',
        'total_amount',
        'discount_amount',
        'discount',
        'notes',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'order_id' => 'integer',
        'emergency_id' => 'integer',
        'amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'discount' => 'decimal:2',
    ];

    public function scopeByOrderId( $query, $orderId ) {
        return $query->where('order_id', $orderId);
    }

    public function scopeByEmergencyId( $query, $emergencyId ) {
        return $this->belongsTo('emergency_id', $emergencyId);
    }

    public function order() {
        return $this->belongsTo("App\\Models\\Order", 'order_id', 'id');
    }

    public function emergency() {
        return $this->belongsTo("App\\Models\\Emergency", 'emergency_id', 'id');
    }

    public function getHashidAttribute() {
    	return _encode_order_emergency( $this->id );
    }
}
