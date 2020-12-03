<?php

namespace App\Repository\Eloquent;

use App\Models\City;
use App\Repository\CityRepositoryInterface;
use Illuminate\Support\Collection;

class CityRepository extends BaseRepository implements CityRepositoryInterface {

    /**
     * UserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(City $model) {
        parent::__construct($model);
    }

    public function all(): Collection {
        return $this->model->orderBy('name')->get();
    }

    public function citiesByProvince( string $provinceHashId ): Collection {
        $provinceId = _decode_province( $provinceHashId );
        return $this->model->byProvinceId( $provinceId )->orderBy('name')->get();
    }
    
}