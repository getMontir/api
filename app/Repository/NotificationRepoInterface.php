<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Collection;

interface NotificationRepoInterface {
    public function check(): Collection;
    public function markAsRead();
    public function all(): Collection;
}