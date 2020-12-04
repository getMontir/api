<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceChildren extends Model
{
    use HasFactory;

    public function scopeByParentId( $query, $id ) {
        return $query->where('parent_id', $id);
    }

    public function scopeByChildId( $query, $id ) {
        return $query->where('child_id', $id);
    }

    public function parents() {
        return $this->belongsTo(\App\Models\Service::class, 'parent_id', 'id');
    }

    public function children() {
        return $this->belongsTo(\App\Models\Service::class, 'child_id', 'id');
    }
}
