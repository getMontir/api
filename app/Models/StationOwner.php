<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StationOwner extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'station_id',
        'member_id',
        'birth_place',
        'birth_date',
        'gender',
        'address',
        'province_id',
        'city_id',
        'district_id',
        'postcode',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'province_id' => 'integer',
        'city_id' => 'integer',
        'district_id' => 'integer',
    ];


    public function station()
    {
        return $this->hasOne("App\\Models\\User", 'station_id', 'id');
    }

    public function getHashidAttribute() {
    	return _encode_station_personal_detail( $this->id );
    }
}
