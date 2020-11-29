<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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

    public function customerDetail() {
        return $this->belongsTo('App\\Models\\UserDetail', 'id', 'user_id');
    }
    
    public function getHashidAttribute() {
    	return _encode_user( $this->id );
    }
}
