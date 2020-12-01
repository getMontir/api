<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StationMechanic extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'station_id',
        'mechanic_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'station_id' => 'integer',
        'mechanic_id' => 'integer',
    ];


    public function station()
    {
        return $this->belongsTo("App\\Models\\User", 'station_id');
    }

    public function mechanic()
    {
        return $this->belongsTo("App\\Models\\User", 'mechanic_id');
    }

    public function getHashidAttribute() {
    	return _encode_station_mechanic( $this->id );
    }
}
