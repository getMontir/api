<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MechanicDetail extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'station_id',
        'name',
        'slug',
        'address',
        'province_id',
        'city_id',
        'district_id',
        'postcode',
        'phonenumber',
        'is_online',
        'is_banned',
        'is_verified',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'station_id' => 'integer',
        'province_id' => 'integer',
        'city_id' => 'integer',
        'district_id' => 'integer',
        'is_online' => 'integer',
        'is_banned' => 'integer',
        'is_verified' => 'integer',
    ];

    public function getHashidAttribute() {
    	return _encode_mechanic_detail( $this->id );
    }
}
