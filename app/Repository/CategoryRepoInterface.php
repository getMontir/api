<?php

namespace App\Repository;

use Illuminate\Support\Collection;

interface CategoryRepoInterface {
    public function all(): Collection;
}