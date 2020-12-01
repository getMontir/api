<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StationEmergency extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'station_id',
        'emergency_id',
        'basic_price',
        'sale_price',
        'upby',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'station_id' => 'integer',
        'emergency_id' => 'integer',
        'basic_price' => 'integer',
        'sale_price' => 'integer',
        'upby' => 'integer'
    ];

    public function scopeCountByServiceId( $query, $emergencyId ) {
        return $query->select('station_id')->whereHas('station')->where('emergency_id', $emergencyId)->groupBy('station_id');
    }

    public function emergency() {
        return $this->belongsTo("App\\Models\\Emergency", 'emergency_id');
    }

    public function station() {
        return $this->belongsTo("App\\Models\\User", 'station_id');
    }

    public function getHashidAttribute() {
    	return _encode_station_emergency( $this->id );
    }
}
