<?php

namespace App\Repository\Eloquent;

use App\Models\Province;
use App\Repository\ProvinceRepositoryInterface;
use Illuminate\Support\Collection;

class ProvinceRepository extends BaseRepository implements ProvinceRepositoryInterface {

    /**
     * UserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(Province $model) {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection {
        return $this->model->orderBy('name')->get();
    }

}