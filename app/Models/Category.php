<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'image_id',
        'name_id',
        'name_en',
        'slug',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parent_id' => 'integer',
        'image_id' => 'integer',
    ];

    public function scopeSearch( $query, $search ) {
        return $query->where('name_id', 'like', '%' . $search . '%')
            ->orWhere('name_en', 'like', '%' . $search . '%');
    }

    public function category()
    {
        return $this->belongsTo("App\\Models\\Category");
    }

    public function attachment()
    {
        return $this->belongsTo("App\\Models\\Attachment", 'image_id');
    }

    public function service_categories() {
        return $this->hasMany("App\\Models\\ServiceCategory", 'category_id');
    }

    public function sparepart_categories() {
        return $this->hasMany("App\\Models\\SparepartCategory", 'category_id');
    }

    public function getHashidAttribute() {
    	return _encode_category( $this->id );
    }

    public function getNameAttribute() {
        $locale = _current_language();

        if( $locale == 'id' ) {
            return $this->name_id;
        }

        if( empty($this->name_en) ) {
            return $this->name_id;
        }

        return $this->name_en;
    }
}
