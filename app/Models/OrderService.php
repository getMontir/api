<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderService extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'service_id',
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
        'service_id' => 'integer',
        'amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'discount' => 'decimal:2',
    ];

    public function scopeCountByServiceId( $query, $serviceId ) {
        return $query->select('order_id')->whereHas('order')->where('service_id', $serviceId)->groupBy('order_id');
    }

    public function service() {
        return $this->belongsTo(\App\Models\Service::class, 'service_id');
    }

    public function order() {
        return $this->belongsTo(\App\Models\Order::class, 'order_id');
    }

    public function getHashidAttribute() {
    	return _encode_order_service( $this->id );
    }
}
