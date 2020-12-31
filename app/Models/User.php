<?php

namespace App\Models;

use App\Auth\Models\Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'verify_token',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_accepted' => 'boolean',
        'is_information_completed' => 'boolean',
        'is_document_completed' => 'boolean',
        'is_banned' => 'boolean'
    ];

    public function attachment() {
        return $this->belongsTo("App\\Models\\Attachment", 'picture_id', 'id')->withDefault();
    }

    public function customerDetail() {
        return $this->belongsTo('App\\Models\\UserDetail', 'id', 'user_id');
    }

    public function socials() {
        return $this->hasMany('App\\Models\\UserSocial', 'user_id', 'id');
    }
    
    public function getHashidAttribute() {
    	return _encode_user( $this->id );
    }
}
