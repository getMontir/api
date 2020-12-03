<?php

namespace App\Repository;

interface VehicleYearRepoInterface {
    public function yearsByTransmission( string $transmissionHashId ): ?array;
}