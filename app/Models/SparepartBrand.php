<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SparepartBrand extends Model
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
        'slug',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'image_id' => 'integer',
    ];

    public function scopeSearch( $query, $search ) {
        return $query->where('name', 'like', "%$search%")
            ->orWhere('slug', 'like', "%$search%");
    }

    public function attachment()
    {
        return $this->belongsTo("App\\Models\\Attachment", 'image_id', 'id');
    }

    public function spareparts() {
        return $this->hasMany("App\\Models\\Sparepart", 'brand_id', 'id');
    }

    public function getHashidAttribute() {
    	return _encode_sparepart_brand( $this->id );
    }
}
