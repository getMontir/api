<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface CustomerVehicleRepoInterface {
    public function all( User $user ): Collection;
    public function default(  User $user ): ?Model;
    public function setDefault( string $customerVehicleHashId ): bool;
    public function create( array $data ): Model;
    public function update( string $customerVehicleHashId, array $data ): ?Model;
    public function delete( string $customerVehicleHashId ): bool;
    public function detail( string $customerVehicleHashId ): ?Model;
}