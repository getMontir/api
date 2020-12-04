<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\SparepartResource;
use App\Repository\Eloquent\CategoryRepository;
use App\Repository\Eloquent\SparepartCategoryRepository;
use App\Repository\Eloquent\SparepartRepository;
use Illuminate\Http\Request;

class SparepartController extends Controller
{
    protected $categoryRepo;

    protected $sparepartRepo;

    protected $sparepartCategoryRepo;

    public function __construct(
        CategoryRepository $a,
        SparepartRepository $b,
        SparepartCategoryRepository $c
    ) {
        $this->categoryRepo = $a;
        $this->sparepartRepo = $b;
        $this->sparepartCategoryRepo = $c;
    }

    public function index() {
        return SparepartResource::collection(
             $this->sparepartRepo->all()
        );
    }

    public function categories() {
        return CategoryResource::collection(
            $this->categoryRepo->all()
        );
    }

    public function sparepartsByCategory( Request $request ) {
        $request->validate([
            'category_id' => 'required|string|min:20|max:20'
        ]);

        return SparepartResource::collection(
            $this->sparepartCategoryRepo->sparepartsByCategory( $request->input('category_id') )
        );
    }

    public function detail( Request $request ) {
        $request->validate([
            'sparepart_id' => 'request|string|min:20|max:20'
        ]);

        $find = $this->sparepartRepo( $request->input('sparepart_id') );
        if( !empty($find) ) {
            return new SparepartResource( $find );
        }

        return abort(404);
    }
}
