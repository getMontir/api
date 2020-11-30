<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerDetail extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
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
        'user_id' => 'integer',
        'gender' => 'integer',
        'province_id' => 'integer',
        'city_id' => 'integer',
        'district_id' => 'integer',
    ];


    public function user()
    {
        return $this->belongsTo("App\\Models\\User", 'user_id', 'id');
    }

    public function customerVehicles()
    {
        return $this->hasMany("App\\Models\\CustomerVehicle", 'user_id', 'id');
    }

    public function getHashidAttribute() {
    	return _encode_customer_detail( $this->id );
    }
}
