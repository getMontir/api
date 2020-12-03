<?php

namespace App\Repository\Eloquent;

use App\Models\ServiceCategory;
use App\Repository\ServiceCategoryRepoInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;

class ServiceCategoryRepository extends BaseRepository implements ServiceCategoryRepoInterface {

    public function __construct( ServiceCategory $model ) {
        parent::__construct( $model );
    }

    public function all(): Collection {
        return $this->model->orderBy('name')->get();
    }

    public function detail( string $categoryHashId ): ?Model {
        $id = _decode_service_category( $categoryHashId );
        return ServiceCategory::find($id);
    }

    public function services( string $categoryHashId ): Collection {
        $id = _decode_service_category( $categoryHashId );
        try {
            $find = ServiceCategory::findOrFail($id);
            return $find->services;
        } catch( ModelNotFoundException $e ) {
            return new Collection();
        }
    }

}