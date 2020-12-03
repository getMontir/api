<?php

namespace App\Repository\Eloquent;

use App\Models\VehicleTransmission;
use App\Repository\VehicleTransmissionRepoInterface;
use Illuminate\Support\Collection;

class VehicleTransmissionRepository extends BaseRepository implements VehicleTransmissionRepoInterface {

    public function __construct( VehicleTransmission $model )
    {
        parent::__construct($model);
    }

    public function all(): Collection {
        return $this->model->orderBy('name')->get();
    }

    public function transmissionsByType( $typeHashId ): Collection {
        $typeId = _decode_vehicle_type( $typeHashId );
        return $this->model->byTypeId( $typeId );
    }

}