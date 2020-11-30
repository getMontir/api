<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'station_id',
        'mechanic_id',
        'customer_id',
        'customer_vehicle_id',
        'reff',
        'latitude',
        'longitude',
        'address',
        'point_note',
        'total',
        'discount_amount',
        'discount',
        'geocode',
        'order_timestamp',
        'service_timestamp',
        'is_service',
        'is_sparepart',
        'is_emergency',
        'is_promo',
        'order_status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'station_id' => 'integer',
        'mechanic_id' => 'integer',
        'customer_id' => 'integer',
        'customer_vehicle_id' => 'integer',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'is_service' => 'integer',
        'is_sparepart' => 'integer',
        'is_emergency' => 'integer',
        'is_promo' => 'integer',
        'order_status' => 'integer',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'order_timestamp',
        'service_timestamp',
    ];

    public function station() {
        return $this->belongsTo("App\\Models\\User", 'station_id', 'id');
    }

    public function mechanic() {
        return $this->belongsTo("App\\Models\\User", 'mechanic_id', 'id');
    }

    public function customer() {
        return $this->belongsTo("App\\Models\\User", 'customer_id', 'id');
    }

    public function customerVehicle() {
        return $this->belongsTo("App\\Models\\CustomerVehicle", 'customer_vehicle_id', 'id');
    }

    public function detailServices() {
        return $this->hasMany("App\\Models\\OrderService", 'order_id', 'id');
    }

    public function detailSpareparts() {
        return $this->hasMany("App\\Models\\OrderSparepart", 'order_id', 'id');
    }

    public function detailEmergency() {
        return $this->hasOne("App\\Models\\OrderEmergency", 'order_id', 'id');
    }

    public function getHashidAttribute() {
    	return _encode_order( $this->id );
    }
}
