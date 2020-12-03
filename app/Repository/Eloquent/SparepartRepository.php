<?php

namespace App\Repository\Eloquent;

use App\Models\Sparepart;
use App\Repository\SparepartRepoInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class SparepartRepository extends BaseRepository implements SparepartRepoInterface {

    public function __construct( Sparepart $model ) {
        parent::__construct( $model );
    }

    public function all(): Collection {
        return $this->model->orderBy('name')->get();
    }

    public function detail( string $sparepartHashId ): ?Model {
        $id = _decode_sparepart( $sparepartHashId );
        return Sparepart::find($id);
    }
}