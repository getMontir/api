<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'province_id',
        'name',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'province_id' => 'integer',
    ];

    public function scopeByProvinceId( $query, $provinceId ) {
        return $query->where('province_id', $provinceId);
    }

    public function scopeSearch( $query, $search ) {
        return $query->where('name', 'like', '%' . $search . '%')
            ->orWhere('slug', 'like', '%' . $search . '%')
            ->orWhereHas('province', function($q) use($search) {
                $q->search( $search );
            });
    }

    public function province()
    {
        return $this->belongsTo("App\\Models\\Province", 'province_id', 'id');
    }

    public function districts()
    {
        return $this->hasMany("App\\Models\\District", 'city_id', 'id');
    }

    public function getHashidAttribute() {
    	return _encode_city( $this->id );
    }
}
