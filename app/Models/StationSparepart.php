<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StationSparepart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'station_id',
        'sparepart_id',
        'gm_buy_price',
        'gm_sale_price',
        'buy_price',
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
        'sparepart_id' => 'integer',
        'gm_buy_price' => 'integer',
        'gm_sale_price'=> 'integer',
        'buy_price' => 'integer',
        'sale_price' => 'integer',
        'upby' => 'integer'
    ];

    public function scopeCountByServiceId( $query, $sparepartId ) {
        return $query->select('station_id')->whereHas('station')->where('sparepart_id', $sparepartId)->groupBy('station_id');
    }

    public function sparepart() {
        return $this->belongsTo("App\\Models\\Sparepart", 'sparepart_id');
    }

    public function station() {
        return $this->belongsTo("App\\Models\\User", 'station_id');
    }

    public function getHashidAttribute() {
    	return _encode_station_sparepart( $this->id );
    }
}
