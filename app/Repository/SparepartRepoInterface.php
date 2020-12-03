<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface SparepartRepoInterface {
    public function all(): Collection;
    public function detail( string $sparepartHashId ): ?Model;
}