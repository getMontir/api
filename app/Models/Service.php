<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'icon_id',
        'name_id',
        'name_en',
        'slug',
        'price_basic',
        'price_publish',
        'recomendation_up',
        'duration_easy',
        'duration_medium',
        'duration_hard',
        'is_easy',
        'is_medium',
        'is_hard',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parent_id' => 'integer',
        'icon_id' => 'integer',
        'is_easy' => 'integer',
        'is_medium' => 'integer',
        'is_hard' => 'integer',
    ];

    public function scopeSearch( $query, $search ) {
        return $query->where('name_id', 'like', '%' . $search . '%')
            ->orWhere('name_en', 'like', '%' . $search . '%')
            ->orWhere('price_basic', 'like', '%' . $search . '%')
            ->orWhere('price_publish', 'like', '%' . $search . '%')
            ->orWhere('recomendation_up', 'like', '%' . $search . '%')
            ->orWhere('duration_easy', 'like', '%' . $search . '%')
            ->orWhere('duration_medium', 'like', '%' . $search . '%')
            ->orWhere('duration_hard', 'like', '%' . $search . '%');
    }

    public function scopeByTuneup( $query ) {
        return $query->where('is_tuneup', 1);
    }

    public function scopeByPackage( $query ) {
        return $query->where('is_package', 1);
    }

    public function service()
    {
        return $this->belongsTo(\App\Models\Service::class);
    }

    public function children() {
        return $this->hasMany(\App\Models\Service::class, 'parent_id', 'id');
    }

    public function serviceMorphMany() {
        return $this->morphMany(\App\Models\Service::class, 'parent', 'id');
    }

    public function parent() {
        return $this->morphTo();
    }

    public function attachment()
    {
        return $this->belongsTo(\App\Models\Attachment::class)->withDefault();
    }

    public function categories() {
        return $this->hasMany(\App\Models\ServiceCategory::class, 'service_id' );
    }

    public function getHashidAttribute() {
    	return _encode_service( $this->id );
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

    public function getServiceCategoryIdsAttribute() {
        $categories = $this->categories;
        $result = [];

        foreach( $categories as $cat ) {
            $result[] = $cat->category->hashid;
        }

        return $result;
    }

    public function getServiceCategoryListAttribute() {
        $categories = $this->categories;
        $result = [];

        foreach( $categories as $cat ) {
            $category = $cat->category;
            $result[] = [
                'id' => $category->hashid,
                'name' => $category->name,
            ];
        }

        return $result;
    }

    public function getFormattedPriceBasicAttribute() {
        $price = $this->price_basic ?? 0;
        $price = _format_currency( $price );

        return $price;
    }

    public function getFormattedPricePublishAttribute() {
        $price = $this->price_publish ?? 0;
        $price = _format_currency( $price );

        return $price;
    }

    public function getFormattedDurationEasyAttribute() {
        $duration = $this->duration_easy ?? 0;
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

    public function getFormattedRecomendationUpAttribute() {
        $val = $this->recomendation_up;
        $val = _format_number( $val ) . '%';

        return $val;
    }

    public function getDifficulityAttribute() {
        if( $this->is_easy == 1 ) {
            return __('service.difficulity.easy');
        } elseif( $this->is_medium == 1 ) {
            return __('service.difficulity.medium');
        } elseif( $this->is_hard == 1 ) {
            return __('service.difficulity.hard');
        }

        return '-';
    }

    public function getDifficulityNumberAttribute() {
        if( $this->is_easy == 1 ) {
            return 1;
        } elseif( $this->is_medium == 1 ) {
            return 2;
        } elseif( $this->is_hard == 1 ) {
            return 3;
        }

        return 1;
    }
}
