<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function scopeById( $query, $id ) {
        return $query->where('id', $id);
    }

    public function scopeSearch( $query, $search ) {
        return $query->where('name', 'like', '%' . $search . '%')
            ->orWhere('slug', 'like', '%' . $search . '%');
    }

    public function cities()
    {
        return $this->hasMany("App\\Models\\City", 'province_id');
    }

    public function getHashidAttribute() {
    	return _encode_province( $this->id );
    }
}
