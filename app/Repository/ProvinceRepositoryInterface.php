<?php

namespace App\Repository;

use Illuminate\Support\Collection;

interface ProvinceRepositoryInterface {
    public function all(): Collection;
}