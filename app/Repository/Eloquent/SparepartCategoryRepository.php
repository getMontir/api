<?php

namespace App\Repository\Eloquent;

use App\Models\SparepartCategory;
use App\Repository\SparepartCategoryRepoInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;

class SparepartCategoryRepository extends BaseRepository implements SparepartCategoryRepoInterface {

    public function __construct( SparepartCategory $model ) {
        parent::__construct( $model );
    }

    public function all(): Collection {
        return $this->model->orderBy('name')->get();
    }

    public function detail( string $categoryHashId ): ?Model {
        $id = _decode_sparepart_category( $categoryHashId );
        return SparepartCategory::find($id);
    }

    public function spareparts( string $categoryHashId ): Collection {
        $id = _decode_sparepart_category( $categoryHashId );
        try {
            $find = SparepartCategory::findOrFail($id);
            return $find->spareparts;
        } catch( ModelNotFoundException $e ) {
            return new Collection();
        }
    }

}