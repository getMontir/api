<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StationDocument extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'station_id',
        'owner_identity_image_id',
        'station_image_id',
        'station_skpt_image_id',
        'station_pbb_image_id',
        'station_skrk_image_id',
        'accepted_owner_identity',
        'accepted_station_image',
        'accepted_skpt',
        'accepted_pbb',
        'accepted_skrk',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'station_id' => 'integer',
        'owner_identity_image_id' => 'integer',
        'station_image_id' => 'integer',
        'station_skpt_image_id' => 'integer',
        'station_pbb_image_id' => 'integer',
        'station_skrk_image_id' => 'integer',
        'is_accepted_owner_identity' => 'integer',
        'is_accepted_station_image' => 'integer',
        'is_accepted_skpt_image' => 'integer',
        'is_accepted_pbb_image' => 'integer',
        'is_accepted_skrk_image' => 'integer',
    ];

    public function station() {
        return $this->belongsTo("App\\Models\\User", 'user_id', 'id');
    }

    public function fileOwnerIdentity()
    {
        return $this->belongsTo("App\\Models\\Attachment", 'owner_identity_image_id', 'id');
    }

    public function fileStationImage() {
        return $this->belongsTo("App\\Models\\Attachment", 'station_image_id', 'id');
    }

    public function fileStationSkpt() {
        return $this->belongsTo("App\\Models\\Attachment", 'station_skpt_image_id', 'id');
    }

    public function fileStationPbb() {
        return $this->belongsTo("App\\Models\\Attachment", 'station_pbb_image_id', 'id');
    }

    public function fileStationSkrk() {
        return $this->belongsTo("App\\Models\\Attachment", 'station_skrk_image_id', 'id');
    }

    public function getHashidAttribute() {
    	return _encode_station_document( $this->id );
    }
}
