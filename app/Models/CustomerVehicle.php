<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerVehicle extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'brand_id',
        'type_id',
        'engine_id',
        'transmission_id',
        'vehicle_year',
        'police_number',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'brand_id' => 'integer',
        'type_id' => 'integer',
        'engine_id' => 'integer',
        'transmission_id' => 'integer',
    ];


    public function user()
    {
        return $this->belongsTo("App\\Models\\User", 'user_id', 'id');
    }

    public function vehicleBrand()
    {
        return $this->belongsTo("App\\Models\\VehicleBrand", 'brand_id', 'id');
    }

    public function vehicleType()
    {
        return $this->belongsTo("App\\Models\\VehicleType", 'type_id', 'id');
    }

    public function vehicleEngine()
    {
        return $this->belongsTo("App\\Models\\VehicleEngine", 'engine_id', 'id');
    }

    public function vehicleTransmission()
    {
        return $this->belongsTo("App\\Models\\VehicleTransmission", 'transmission_id', 'id');
    }

    public function getHashidAttribute() {
    	return _encode_customer_vehicle( $this->id );
    }
}
