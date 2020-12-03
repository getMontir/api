<?php

namespace App\Repository\Eloquent;

use App\Models\VehicleTransmission;
use App\Repository\VehicleYearRepoInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VehicleYearRepository extends BaseRepository implements VehicleYearRepoInterface {

    public function __construct( VehicleTransmission $model ) {
        parent::__construct( $model );
    }

    public function yearsByTransmission( string $transmissionHashId ): ?array {
        $transId = _decode_vehicle_transmission( $transmissionHashId );
        try {
            $find = VehicleTransmission::find( $transId );
            return [ $find->from_year, $find->to_year ];
        } catch( ModelNotFoundException $e ) {
            return null;
        }
    }
}