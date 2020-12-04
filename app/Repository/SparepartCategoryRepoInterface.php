<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface SparepartCategoryRepoInterface {
    public function all(): Collection;
    public function detail( string $categoryHashId ): ?Model;
    public function spareparts( string $categoryHashId ): Collection;
    public function sparepartsByCategory( string $categoryHashId ): Collection;
}