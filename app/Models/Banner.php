<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
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
        'description',
        'banner_order',
        'action',
        'paramater',
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
            ->orWhere('description', 'like', "%$search%")
            ->orWhere('banner_order', 'like', "%$search%")
            ->orWhere('action', 'like', "%$search%")
            ->orWhere('paramater', 'like', "%$search%");
    }

    public function getHashidAttribute() {
    	return _encode_banner( $this->id );
    }

    public function role() {
        return $this->belongsTo("App\\Models\\Role", 'role_id', 'id');
    }

    public function attachment() {
        return $this->belongsTo("App\\Models\\Attachment", 'image_id');
    }
}
