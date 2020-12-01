<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StationDetail extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'personal_id',
        'name',
        'slug',
        'address',
        'province_id',
        'city_id',
        'district_id',
        'postcode',
        'latitude',
        'longitude',
        'is_official',
        'is_dealer',
        'is_mitra',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'personal_id' => 'integer',
        'province_id' => 'integer',
        'city_id' => 'integer',
        'district_id' => 'integer',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'is_official' => 'integer',
        'is_dealer' => 'integer',
        'is_mitra' => 'integer',
    ];

    public function station() {
        return $this->belongsTo("App\\Models\\User", 'user_id', 'id');
    }

    public function stationDocument()
    {
        return $this->hasOne("App\\Models\\StationDocument", 'user_id', 'user_id');
    }

    public function stationOwner() {
        return $this->hasOne("App\\Models\\StationOwner", 'user_id', 'user_id');
    }

    public function province() {
        return $this->belongsTo("App\\Models\\Province");
    }

    public function city() {
        return $this->belongsTo("App\\Models\\City");
    }

    public function district() {
        return $this->belongsTo("App\\Models\\District");
    }

    public function getHashidAttribute() {
    	return _encode_station_detail( $this->id );
    }
}
