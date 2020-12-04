<?php

namespace App\Repository\Eloquent;

use App\Models\Service;
use App\Repository\ServiceRepoInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;

class ServiceRepository extends BaseRepository implements ServiceRepoInterface {

    public function __construct( Service $model ) {
        parent::__construct( $model );
    }

    public function all(): Collection {
        return $this->model->orderBy('name')->get();
    }

    public function tuneups(): Collection {
        if( _current_language() == 'en' ) {
            return $this->model->byTuneup()->with(['children'])->orderBy('name_en')->get();
        }

        return $this->model->byTuneup()->with(['children'])->orderBy('name_id')->get();
    }

    public function packages(): Collection {
        if( _current_language() == 'en' ) {
            return $this->model->byPackage()->orderBy('name_id')->get();
        }

        return $this->model->byPackage()->orderBy('name_id')->get();
    }

    public function packageDetail( string $serviceHashId ): ?Model {
        $id = _decode_service( $serviceHashId );
        return Service::find($id);
    }

    public function detail( string $serviceHashId ): ?Model {
        $id = _decode_service( $serviceHashId );
        return Service::find($id);
    }

    public function spareparts( string $serviceHashId ): Collection {
        $id = _decode_service( $serviceHashId );
        try {
            $find = Service::findOrFail($id);
            return $find->spareparts;
        } catch( ModelNotFoundException $e ) {
            return new Collection();
        }
    }

}