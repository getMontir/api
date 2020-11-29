<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'filename',
        'url',
        'extension',
        'mime',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
    ];

    public function getHashidAttribute() {
    	return _encode_attachment( $this->id );
    }

    public function getMimeTypeAttribute() {
    	$mime = $this->mime;
    	$sub = explode("/", $mime);
    	$mime = substr( $mime, 0, 5 );

    	switch( $mime ) {
    		default:
    			return 'other';
    			break;

    		case 'image':
    			return 'image';
    			break;

    		case 'appli':
    			return 'application';
    			break;

    		case 'audio':
    			return 'audio';
    			break;

    		case 'video':
    			return 'video';
    			break;
    	}
    }

    public function getAttachmentLinkAttribute() {
    	return get_attachment_from_file($this);
    }
}
