<?php

namespace App\Repository;

use Illuminate\Support\Collection;

interface BannerRepoInterface {
    public function forCustomer(): Collection;
    public function forStation(): Collection;
    public function forMechanic(): Collection;
}