<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderSparepart extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'sparepart_id',
        'qty',
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
        'sparepart_id' => 'integer',
        'qty' => 'integer',
        'amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'discount' => 'decimal:2',
    ];

    public function service() {
        return $this->belongsTo("App\\Models\\Service", 'service_id');
    }

    public function order() {
        return $this->belongsTo("App\\Models\\Order", 'order_id');
    }

    public function getHashidAttribute() {
    	return _encode_order_sparepart( $this->id );
    }
}
