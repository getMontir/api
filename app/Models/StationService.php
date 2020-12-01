<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StationService extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'station_id',
        'service_id',
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
        'service_id' => 'integer',
        'basic_price' => 'integer',
        'sale_price' => 'integer',
        'upby' => 'integer'
    ];

    public function scopeCountByServiceId( $query, $serviceId ) {
        return $query->select('station_id')->whereHas('station')->where('service_id', $serviceId)->groupBy('station_id');
    }

    public function service() {
        return $this->belongsTo("App\\Models\\Service", 'service_id');
    }

    public function station() {
        return $this->belongsTo("App\\Models\\User", 'station_id');
    }

    public function getHashidAttribute() {
    	return _encode_station_service( $this->id );
    }
}
