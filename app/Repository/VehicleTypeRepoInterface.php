<?php

namespace App\Repository;

use Illuminate\Support\Collection;

interface VehicleTypeRepoInterface {
    public function all(): Collection;
    public function typesByBrands( string $brandHashId ): Collection;
}