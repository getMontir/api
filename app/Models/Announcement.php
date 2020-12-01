<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcement extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'for_role_id',
        'name',
        'description',
        'date_time_start',
        'date_time_end',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date_time_start',
        'date_time_end',
    ];

    public function scopeByToday( $query ) {
    	$now = Carbon::now();
        $nowFormatted = $now->format('Y-m-d');
    	return $query->whereRaw( "('".$nowFormatted . "' BETWEEN `date_time_start` and `date_time_end`)");
    }

    public function scopeByPast( $query ) {
        $now = Carbon::now();
        $nowFormatted = $now->format('Y-m-d');
        // return $query->whereRaw( "('".$nowFormatted . "' NOT BETWEEN `start_date` and `end_date`)");
        return $query->where('date_time_end', '>=', $nowFormatted)->where('date_time_end', '>=', $nowFormatted);
    }

    public function role() {
        return $this->belongsTo("App\\Models\\Role", 'for_role_id', 'id');
    }

    public function getHashidAttribute() {
        return _encode_announcement( $this->id );
    }
}
