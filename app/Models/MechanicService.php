<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MechanicService extends Model
{
    use HasFactory;

    public function scopeByMechanicId( $query, $mechanicId ) {
        return $query->where('mechanic_id', $mechanicId);
    }

    public function scopeByServiceId( $query, $serviceId ) {
        return $query->where('service_id', $serviceId);
    }

    public function mechanic() {
        return $this->belongsTo("App\\Models\\User", 'mechanic_id', 'id');
    }

    public function getHashidAttribute() {
        return _encode_mechanic_service( $this->id );
    }
}
