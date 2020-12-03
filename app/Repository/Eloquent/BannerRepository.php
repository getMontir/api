<?php

namespace App\Repository\Eloquent;

use App\Models\Banner;
use App\Repository\BannerRepoInterface;
use Illuminate\Support\Collection;

class BannerRepository extends BaseRepository implements BannerRepoInterface {

    public function __construct( Banner $model ) {
        parent::__construct( $model );
    }

    public function forCustomer(): Collection {
        return $this->model->forCustomer()->orderBy('banner_order')->get();
    }

    public function forStation(): Collection {
        return $this->model->forStation()->orderBy('banner_order')->get();
    }

    public function forMechanic(): Collection {
        return $this->model->forMechanic()->orderBy('banner_order')->get();
    }

}