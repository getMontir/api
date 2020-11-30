<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MechanicEmergency extends Model
{
    use HasFactory;

    public function scopeByMechanicId( $query, $mechanicId ) {
        return $query->where('mechanic_id', $mechanicId);
    }

    public function scopeByEmergencyId( $query, $emergencyId ) {
        return $query->where('emergency_id', $emergencyId);
    }

    public function mechanic() {
        return $this->belongsTo("App\\Models\\User", 'mechanic_id', 'id');
    }

    public function emergency() {
        return $this->belongsTo("App\\Models\\Emergency", 'emergency_id', 'id');
    }

    public function getHashidAttribute() {
        return _encode_mechanic_emergency( $this->id );
    }
}
