<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Emergency extends Model
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
        'price',
        'discount',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'price' => 'decimal:2',
        'discount' => 'decimal:2',
    ];

    public function scopeSearch( $query, $search ) {
        return $query->where('name', 'like', "%$search%")
            ->orWhere('slug', 'like', "%$search%")
            ->orWhere('price', 'like', "%$search%")
            ->orWhere('discount', 'like', "%$search%");
    }
    
    public function attachment() {
        return $this->belongsTo("App\\Models\\Attachment", 'image_id')->withDefault();
    }

    public function getHashidAttribute() {
    	return _encode_emergency( $this->id );
    }

    public function getFormattedPriceAttribute() {
        $price = $this->price ?? 0;
        $price = _format_currency( $price );

        return $price;
    }

    public function getFormattedDiscountAttribute() {
        $discount = $this->discount ?? 0;
        $discount = _format_number( $discount ) . '%';

        return $discount;
    }
}
