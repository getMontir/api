<?php

namespace App\Repository\Eloquent;

use App\Models\District;
use App\Repository\DistrictRepositoryInterface;
use Illuminate\Support\Collection;

class DistrictRepository extends BaseRepository implements DistrictRepositoryInterface {

    public function __construct(District $model)
    {
        parent::__construct($model);
    }

    public function all(): Collection {
        return $this->model->orderBy('name')->get();
    }

    public function districtsByCity( string $cityHashId ): Collection {
        $cityId = _decode_city( $cityHashId );
        return $this->model->byCityId( $cityId )->orderBy('name')->get();
    }
}