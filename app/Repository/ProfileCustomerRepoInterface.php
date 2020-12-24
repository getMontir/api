<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface ProfileCustomerRepoInterface {
    public function profile(): ?Model;
    public function verify(): ?Model;
    public function information(Request $request): ?Model;
    public function changePassword(): ?Model;
}