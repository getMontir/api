<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MechanicSparepart extends Model
{
    use HasFactory;

    public function scopeByMechanicId( $query, $mechanicId ) {
        return $query->where('mechanic_id', $mechanicId);
    }

    public function scopeBySparepartId( $query, $sparepartId ) {
        return $query->where('sparepart_id', $sparepartId);
    }

    public function mechanic() {
        return $this->belongsTo("App\\Models\\User", 'mechanic_id', 'id');
    }
    
    public function sparepart() {
        return $this->belongsTo("App\\Models\\Sparepart", 'sparepart_id', 'id');
    }

    public function getHashidAttribute() {
        return _encode_mechanic_sparepart( $this->id );
    }
}
