<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleType extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_id',
        'brand_id',
        'class_id',
        'name',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'image_id' => 'integer',
        'brand_id' => 'integer',
        'class_id' => 'integer',
    ];

    public function scopeByBrandId( $query, $brandId ) {
        return $query->where('brand_id', $brandId);
    }

    public function scopeSearch( $query, $search ) {
        return $query->where('name', 'like', "%$search%")
            ->orWhereHas('vehicleBrand', function($q) use($search) {
                $q->where('name', 'like', "%$search%");
            })
            ->orWhereHas('vehicleClass', function($q) use($search) {
                $q->where('name_id', 'like', "%$search%")
                    ->orWhere('name_en', 'like', "%$search%");
            });
    }

    public function attachment()
    {
        return $this->belongsTo("App\\Models\\Attachment", 'image_id');
    }

    public function vehicleBrand()
    {
        return $this->belongsTo("App\\Models\\VehicleBrand", 'brand_id');
    }

    public function vehicleClass()
    {
        return $this->belongsTo("App\\Models\\VehicleClass", 'class_id');
    }

    public function getHashidAttribute() {
    	return _encode_vehicle_type( $this->id );
    }
}
