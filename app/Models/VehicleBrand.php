<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleBrand extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_id',
        'name',
        'type',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'image_id' => 'integer',
        'type' => 'integer',
    ];

    public function scopeSearch( $query, $search ) {
        return $query->where('name', 'like', '%' . $search . '%');
    }

    public function attachment()
    {
        return $this->belongsTo("App\\Models\\Attachment", 'image_id', 'id')->withDefault();
    }

    public function getHashidAttribute() {
    	return _encode_vehicle_brand( $this->id );
    }

    public function getTypeNameAttribute() {
        $type = $this->type;

        if( $type == 1 ) {
            return __('vehicle-brand.type.motor');
        }

        if( $type == 2 ) {
            return __('vehicle-brand.type.car');
        }

        return '-';
    }
}
