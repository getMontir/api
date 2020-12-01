<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleTransmission extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_id',
        'engine_id',
        'name',
        'from_year',
        'to_year',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type_id' => 'integer',
        'engine_id' => 'integer',
    ];


    public function vehicleType()
    {
        return $this->belongsTo("App\\Models\\VehicleType", 'type_id');
    }

    public function vehicleEngine()
    {
        return $this->belongsTo("App\\Models\\VehicleEngine", 'engine_id');
    }

    public function getHashidAttribute() {
    	return _encode_vehicle_transmission( $this->id );
    }
}
