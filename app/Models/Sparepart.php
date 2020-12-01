<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sparepart extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'picture_id',
        'category_id',
        'brand_id',
        'engine_id',
        'service_id',
        'name',
        'slug',
        'basic_price',
        'recomendation_up',
        'duration_normal',
        'duration_medium',
        'duration_hard',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'picture_id' => 'integer',
        'category_id' => 'integer',
        'brand_id' => 'integer',
        'engine_id' => 'integer',
        'service_id' => 'integer',
    ];

    public function scopeSearch( $query, $search ) {
        return $query->where('name', 'like', "%$search%")
            ->orWhere('slug', 'like', "%$search%")
            ->orWhereHas('sparepartCategory', function($q) use($search) {
                $q->where('name_id', 'like', "%$search%")
                    ->orWhere('name_en', 'like', "%$search%");
            })
            ->orWhereHas('sparepartBrand', function($q) use($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('slug', 'like', "%$search%");
            })
            ->orWhereHas('vehicleEngine', function($q) use($search) {
                $q->where('name_id', 'like', "%$search%")
                    ->orWhere('name_en', 'like', "%$search%");
            })
            ->orWhereHas('service', function($q) use($search) {
                $q->where('name_id', 'like', "%$search%")
                    ->orWhere('name_en', 'like', "%$search%");
            });
    }

    public function attachment()
    {
        return $this->belongsTo("App\\Models\\Attachment", 'image_id');
    }

    public function sparepartCategory()
    {
        return $this->belongsTo("App\\Models\\SparepartCategory", 'category_id');
    }

    public function sparepartCategories() {
        return $this->hasMany("App\\Models\\SparepartCategory", 'sparepart_id');
    }

    public function sparepartBrand()
    {
        return $this->belongsTo("App\\Models\\SparepartBrand", 'brand_id');
    }

    public function vehicleEngine()
    {
        return $this->belongsTo("App\\Models\\VehicleEngine", 'engine_id');
    }

    public function service()
    {
        return $this->belongsTo("App\\Models\\Service", 'service_id');
    }

    public function getHashidAttribute() {
    	return _encode_sparepart( $this->id );
    }

    public function getFormattedCategoriesAttribute() {
        $categories = $this->sparepartCategories;
        $result = [];

        foreach( $categories as $c ) {
            $cat = $c->category;
            if( !empty($cat) ) {
                $result[] = [
                    'id' => $cat->hashid,
                    'name' => $cat->name
                ];
            }
        }

        return $result;
    }

    public function getFormattedCategoryIdsAttribute() {
        $categories = $this->sparepartCategories;
        $result = [];

        foreach( $categories as $c ) {
            $result[] = $c->category->hashid;
        }

        return $result;
    }

    public function getFormattedBrandAttribute() {
        $brand = $this->sparepartBrand;

        if( !empty($brand) ) {
            return $brand->name;
        }

        return '&mdash;';
    }

    public function getFormattedEngineAttribute() {
        $engine = $this->vehicleEngine;

        if( !empty($engine) ) {
            return $engine->name;
        }

        return '&mdash;';
    }

    public function getFormattedServiceAttribute() {
        $service = $this->service;

        if( !empty($service) ) {
            return $service->name;
        }

        return '-';
    }

    public function getFormattedBasicPriceAttribute() {
        $price = $this->basic_price ?? 0;
        $price = _format_currency( $price );

        return $price;
    }

    public function getFormattedRecomendationUpAttribute() {
        $val = $this->recomendation_up;
        $val = _format_number( $val ) . '%';

        return $val;
    }

    public function getFormattedDurationEasyAttribute() {
        $duration = $this->duration_normal ?? 0;
        $duration = _format_duration( $duration );

        return $duration;
    }

    public function getFormattedDurationMediumAttribute() {
        $duration = $this->duration_medium ?? 0;
        $duration = _format_duration( $duration );

        return $duration;
    }

    public function getFormattedDurationHardAttribute() {
        $duration = $this->duration_hard ?? 0;
        $duration = _format_duration( $duration );

        return $duration;
    }
}
