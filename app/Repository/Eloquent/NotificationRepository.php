<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\NotificationRepoInterface;
use Illuminate\Support\Collection;

class NotificationRepository extends BaseRepository implements NotificationRepoInterface {
    
    public function __construct( User $model ) {
        parent::__construct( $model );
    }

    public function all(): Collection {
        return $this->model->notifications;
    }

    public function check(): Collection {
        return $this->model->unreadNotifications;
    }

    public function markAsRead() {
        $this->model->unreadNotifications->markAsRead();
    }

}