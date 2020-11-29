<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetail extends Model
{
    use HasFactory, SoftDeletes;

    public function user() {
        return $this->belongsTo('App\\Models\\User', 'user_id', 'id');
    }

    public function province() {
        return $this->belongsTo('App\\Models\\Province', 'province_id', 'id');
    }

    public function city() {
        return $this->belongsTo('App\\Models\\City', 'city_id', 'id');
    }

    public function district() {
        return $this->belongsTo('App\\Models\\District', 'district_id', 'id');
    }

    public function getJkAttribute() {
        $gender = strtolower($this->gender);
        $data = null;

        switch( $gender ) {
            case 'l':
                $data = 'Laki - laki';
                break;

            case 'p':
                $data = 'Perempuan';
                break;
        }

        return $data;
    }

    public function getHashidAttribute() {
    	return _encode_user_detail( $this->id );
    }
    
}
