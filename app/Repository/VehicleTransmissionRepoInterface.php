<?php

namespace App\Repository;

use Illuminate\Support\Collection;

interface VehicleTransmissionRepoInterface {
    public function all(): Collection;
    public function transmissionsByType( $typeHashId ): Collection;
}