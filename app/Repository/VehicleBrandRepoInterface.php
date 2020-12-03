<?php

namespace App\Repository;

use Illuminate\Support\Collection;

interface VehicleBrandRepoInterface {
    public function all(): Collection;
}