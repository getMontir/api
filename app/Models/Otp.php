<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Otp extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'otps';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'user_id',
    	'code',
    	'expired',
    	'is_used',
        'data',
        'type'
    ];

    public function scopeCheckOtp($query, $str){
        return $query->where('code', $str);
    }

    public function scopeByUser( $query, $userId ) {
    	return $query->where('user_id', $userId);
    }

    public function scopeByType( $query, $type ) {
        return $query->where('type', $type);
    }

    public function user() {
    	return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getHashidAttribute() {
        return _encode_otp( $this->id );
    }

}
