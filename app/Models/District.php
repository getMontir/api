<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'city_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'city_id' => 'integer',
    ];

    public function scopeByCityId( $query, $id ) {
        return $query->where('city_id', $id);
    }

    public function scopeSearch( $query, $search ) {
        return $query->where('name', 'like', '%' . $search . '%')
            ->orWhere('slug', 'like', "%$search%")
            ->orWhereHas('city', function($q) use($search) {
                $q->search( $search );
            });
    }

    public function city()
    {
        return $this->belongsTo("App\\Models\\City", 'city_id');
    }

    public function getHashidAttribute() {
    	return _encode_district( $this->id );
    }
}
