<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ServiceRepoInterface {
    public function all(): Collection;
    public function tuneups(): Collection;
    public function packages(): Collection;
    public function packageDetail( string $serviceHashId ): ?Model;
    public function detail( string $serviceHashId ): ?Model;
    public function spareparts( string $serviceHashId ): Collection;
}