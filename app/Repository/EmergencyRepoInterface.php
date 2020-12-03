<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface EmergencyRepoInterface {
    public function all(): Collection;
    public function detail( string $emergencyHashId ): ?Model;
}