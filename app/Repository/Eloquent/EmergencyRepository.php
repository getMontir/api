<?php

namespace App\Repository\Eloquent;

use App\Models\Emergency;
use App\Repository\EmergencyRepoInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class EmergencyRepository extends BaseRepository implements EmergencyRepoInterface {
    
    public function __construct( Emergency $model ) {
        parent::__construct( $model );
    }

    public function all(): Collection {
        return $this->model->orderBy('name')->get();
    }

    public function detail( string $emergencyHashId ): ?Model {
        $id = _decode_emergency( $emergencyHashId );
        return Emergency::find($id);
    }
}