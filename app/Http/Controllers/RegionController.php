<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityResource;
use App\Http\Resources\DistrictResource;
use App\Http\Resources\ProvinceResource;
use App\Repository\Eloquent\CityRepository;
use App\Repository\Eloquent\DistrictRepository;
use App\Repository\Eloquent\ProvinceRepository;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    protected $provinceRepo;

    protected $cityRepo;

    protected $districtRepo;

    public function __construct(
        ProvinceRepository $a,
        CityRepository $b,
        DistrictRepository $c
    ) {
        $this->provinceRepo = $a;
        $this->cityRepo = $b;
        $this->districtRepo = $c;
    }
    public function provinces( Request $request ) {
        return ProvinceResource::collection( $this->provinceRepo->all() );
    }

    public function cities( Request $request ) {
        return CityResource::collection( $this->cityRepo->all() );
    }

    public function districts( Request $request ) {
        return DistrictResource::collection( $this->districtRepo->all() );
    }

    public function citiesByProvince( Request $request ) {
        $request->validate([
            'province_id' => 'required|string|min:20|max:20'
        ]);

        return CityResource::collection( $this->cityRepo->citiesByProvince( $request->input('province_id' ) ) );
    }

    public function districtsByCity( Request $request ) {
        $request->validate([
            'city_id' => 'required|string|min:20|max:20'
        ]);

        return DistrictResource::collection(
            $this->districtRepo->districtsByCity( $request->input('city_id') )
        );
    }

}
