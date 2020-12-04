<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\SparepartResource;
use App\Repository\Eloquent\CategoryRepository;
use App\Repository\Eloquent\ServiceCategoryRepository;
use App\Repository\Eloquent\ServiceRepository;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $serviceRepo;

    protected $serviceCategoryRepo;

    protected $categoryRepo;

    public function __construct(
        ServiceRepository $a,
        ServiceCategoryRepository $b,
        CategoryRepository $c
    ) {
        $this->serviceRepo = $a;
        $this->serviceCategoryRepo = $b;
        $this->categoryRepo = $c;
    }
    
    public function tuneups() {
        return ServiceResource::collection(
            $this->serviceRepo->tuneups()
        );
    }

    public function categories() {
        return CategoryResource::collection(
            $this->categoryRepo->all()
        );
    }

    public function packages() {
        return ServiceResource::collection(
            $this->serviceRepo->packages()
        );
    }

    public function servicesByCategory( Request $request ) {
        $request->validate([
            'category_id' => 'required|string|min:20|max:20'
        ]);

        return ServiceResource::collection(
            $this->serviceCategoryRepo->services( $request->input('category_id') )
        );
    }

    public function detailPackage( Request $request ) {
        $request->validate([
            'service_id' => 'required|string|min:20|max:20'
        ]);

        $find = $this->serviceRepo->detail( $request->input('service_id') );
        if( empty($find) ) {
            return abort(404);
        }

        if( !empty($find) ) {
            if( $find->is_package != 1 ) {
                return abort(404);
            }
        }

        return new ServiceResource($find);
    }

    public function detail( Request $request ) {
        $request->validate([
            'service_id' => 'required|string|min:20|max:20'
        ]);

        return new ServiceResource(
            $this->serviceRepo->detail( $request->input('service_id') )
        );
    }

    public function detailSpareparts( Request $request ) {
        $request->validate([
            'service_id' => 'required|string|min:20|max:20',
            'transmission_id' => 'required|string|min:20|max:20'
        ]);

        return SparepartResource::collection(
            $this->serviceRepo->spareparts( $request->input('service_id'), $request->input('transmission_id') )
        );
    }

}
