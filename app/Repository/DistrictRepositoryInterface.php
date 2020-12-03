<?php

namespace App\Repository;

use Illuminate\Support\Collection;

interface DistrictRepositoryInterface {
    public function all(): Collection;
    public function districtsByCity( string $cityHashId ): Collection;
}