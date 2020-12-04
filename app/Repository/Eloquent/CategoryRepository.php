<?php

namespace App\Repository\Eloquent;

use App\Models\Category;
use App\Repository\CategoryRepoInterface;
use Illuminate\Support\Collection;

class CategoryRepository extends BaseRepository implements CategoryRepoInterface {

    public function __construct( Category $model ) {
        parent::__construct( $model );
    }

    public function all(): Collection {
        if( _current_language() == 'en' ) {
            $this->model->orderBy('name_en')->get();
        }
        
        return $this->model->orderBy('name_id')->get();
    }
}