<?php

namespace App\Http\Controllers;

use App\Http\Resources\VehicleBrandResource;
use App\Http\Resources\VehicleTransmissionResource;
use App\Http\Resources\VehicleTypeResource;
use App\Http\Resources\VehicleYearResource;
use App\Repository\Eloquent\VehicleBrandRepository;
use App\Repository\Eloquent\VehicleTransmissionRepository;
use App\Repository\Eloquent\VehicleTypeRepository;
use App\Repository\Eloquent\VehicleYearRepository;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    protected $brandRepo;

    protected $typeRepo;

    protected $transmissionRepo;

    protected $yearRepo;

    public function __construct(
        VehicleBrandRepository $a,
        VehicleTypeRepository $b,
        VehicleTransmissionRepository $c,
        VehicleYearRepository $d
    ) {
        $this->brandRepo = $a;
        $this->typeRepo = $b;
        $this->transmissionRepo = $c;
        $this->yearRepo = $d;
    }

    public function brands() {
        return VehicleBrandResource::collection(
            $this->brandRepo->all()
        );
    }

    public function types() {
        return VehicleTypeResource::collection(
            $this->typeRepo->all()
        );
    }

    public function transmissions() {
        return VehicleTransmissionResource::collection(
            $this->transmissionRepo->all()
        );
    }

    public function typesByBrand( Request $request ) {
        $request->validate([
            'brand_id' => 'required|string|min:20|max:20'
        ]);

        return VehicleTypeResource::collection(
            $this->typeRepo->typesByBrands( $request->input('brand_id') )
        );
    }

    public function transmissionsByType( Request $request ) {
        $request->validate([
            'type_id' => 'required|string|min:20|max:20'
        ]);

        return VehicleTransmissionResource::collection(
            $this->transmissionRepo->transmissionsByType( $request->input('type_id') )
        );
    }

    public function yearsByTransmission( Request $request ) {
        $request->validate([
            'transmission_id' => 'required|string|min:20|max:20'
        ]);

        $years = $this->yearRepo->yearsByTransmission( $request->input('transmission_id') );
        $data = [];

        if( !empty($years) ) {
            for( $i = $years[0]; $i <= $years[1]; $i++ ) {
                $data[] = $i;
            }
        }

        return response()->json([
            'data' => $data
        ]);
    }

}
