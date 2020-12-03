<?php

namespace App\Repository\Eloquent;

use App\Models\VehicleBrand;
use App\Repository\VehicleBrandRepoInterface;
use Illuminate\Support\Collection;

class VehicleBrandRepository extends BaseRepository implements VehicleBrandRepoInterface {

    public function __construct( VehicleBrand $model ) {
        parent::__construct($model);
    }

    public function all(): Collection {
        return $this->model->orderBy('name')->get();
    }
    
}