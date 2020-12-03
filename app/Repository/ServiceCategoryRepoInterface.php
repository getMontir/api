<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ServiceCategoryRepoInterface {
    public function all(): Collection;
    public function detail( string $categoryHashId ): ?Model;
    public function services( string $categoryHashId ): Collection;
}