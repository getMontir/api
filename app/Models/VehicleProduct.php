<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $cast = [
        'data_sparepart' => 'array',
        'data_service' => 'array'
    ];

    public function scopeByVehicleTransmissionId( $query, $id ) {
        return $query->where('vehicle_transmission_id', $id);
    }

    public function scopeBySparepartBrandId( $query, $id ) {
        return $query->where('sparepart_brand_id', $id);
    }

    public function scopeBySparepartId( $query, $id ) {
        return $query->whereJsonContains('data_sparepart->id', $id);
    }

    public function scopeByServiceId( $query, $id ) {
        return $query->whereJsonContains('data_service->id', $id);
    }

}
