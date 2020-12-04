<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparepartCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'sparepart_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'category_id' => 'integer',
        'sparepart_id' => 'integer',
    ];

    public function scopeByCategoryId( $query, $id ) {
        return $query->where('category_id', $id);
    }

    public function category()
    {
        return $this->belongsTo("App\\Models\\Category", 'category_id', 'id');
    }

    public function sparepart()
    {
        return $this->belongsTo("App\\Models\\Sparepart", 'sparepart_id', 'id');
    }

    public function getHashidAttribute() {
    	return _encode_sparepart_category( $this->id );
    }
}
