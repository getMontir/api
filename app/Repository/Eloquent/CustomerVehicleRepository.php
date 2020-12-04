<?php

namespace App\Repository\Eloquent;

use App\Models\CustomerVehicle;
use App\Models\User;
use App\Repository\CustomerVehicleRepoInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;

class CustomerVehicleRepository extends BaseRepository implements CustomerVehicleRepoInterface {

    public function __construct( CustomerVehicle $model )
    {
        parent::__construct( $model );
    }

    public function all( User $user ): Collection {
        return $this->model->byCustomerId( $user->id )->latest()->get();
    }

    public function default( User $user ): ?Model {
        $find = $this->model->theDefault()->byCustomerId( $user->id )->first();

        if( empty($find) ) {
            $find = $this->model->byCustomerId( $user->id )->first();
        }

        return $find;
    }

    public function setDefault( string $customerVehicleHashId ): bool {
        $id = _decode_customer_vehicle( $customerVehicleHashId );
        
        try {
            $find = $this->model->findOrFail( $id );
            $find->is_default = 1;
            $find->save();
        } catch( ModelNotFoundException $e ) {
            return false;
        }

        return true;
    }

    public function create( array $data ): Model {
        $data = new $this->model( $data );
        $data->save();

        return $data;
    }

    public function update( string $customerVehicleHashId, array $data ): ?Model {
        $id = _decode_customer_vehicle( $customerVehicleHashId );
        try {
            $find = $this->model->findOrFail( $id );
            $this->model->update( $data, [
                'id' => $id
            ]);
        } catch( ModelNotFoundException $e ) {
            return null;
        }

        return $find;
    }

    public function delete( string $customerVehicleHashId ): bool {
        $id = _decode_customer_vehicle( $customerVehicleHashId );
        try {
            $find = $this->model->findOrFail( $id );
            $find->delete();
        } catch( ModelNotFoundException $e ) {
            return false;
        }

        return true;
    }

    public function detail( string $customerVehicleHashId ): ?Model {
        $id = _decode_customer_vehicle( $customerVehicleHashId );
        try {
            $find = $this->model->findOrFail( $id );
        } catch( ModelNotFoundException $e ) {
            return null;
        }

        return $find;
    }

}