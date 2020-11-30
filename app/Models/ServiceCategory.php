<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'service_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'category_id' => 'integer',
        'service_id' => 'integer',
    ];


    public function category()
    {
        return $this->belongsTo("App\\Models\\Category", 'category_id');
    }

    public function service()
    {
        return $this->belongsTo("App\\Models\\Service", 'id', 'service_id');
    }

    public function getHashidAttribute() {
    	return _encode_service_category( $this->id );
    }
}
