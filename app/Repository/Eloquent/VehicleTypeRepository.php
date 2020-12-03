<?php

namespace App\Repository\Eloquent;

use App\Models\VehicleType;
use App\Repository\VehicleTypeRepoInterface;
use Illuminate\Support\Collection;

class VehicleTypeRepository extends BaseRepository implements VehicleTypeRepoInterface {

    public function __construct(VehicleType $model)
    {
        parent::__construct( $model );
    }

    public function all(): Collection {
        return $this->model->orderBy('name')->get();
    }

    public function typesByBrands( string $brandHashId ): Collection {
        $brandId = _decode_vehicle_brand( $brandHashId );
        return $this->model->byBrandId( $brandId )->orderBy('name')->get();
    }

}