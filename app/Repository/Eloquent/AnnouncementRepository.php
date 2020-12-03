<?php

namespace App\Repository\Eloquent;

use App\Models\Announcement;
use App\Repository\AnnouncementRepoInterface;
use Illuminate\Database\Eloquent\Collection;

class AnnouncementRepository extends BaseRepository implements AnnouncementRepoInterface {

    public function __construct( Announcement $model ) {
        parent::__construct( $model );
    }

    public function forCustomer(): Collection {
        return $this->model->forCustomer()->byToday()->orderBy('date_time_end', 'desc')->get();
    }

    public function forStation(): Collection {
        return $this->model->forStation()->byToday()->orderBy('date_time_end', 'desc')->get();
    }

    public function forMechanic(): Collection {
        return $this->model->forMechanic()->byToday()->orderBy('date_time_end', 'desc')->get();
    }

}