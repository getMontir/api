<?php

namespace App\Http\Controllers;

use App\Http\Resources\BannerResource;
use App\Repository\Eloquent\BannerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{
    protected $repo;

    public function __construct(
        BannerRepository $a
    ) {
        $this->repo = $a;
    }

    public function index() {
        $user = Auth::user();
        $data = null;

        switch( $user->role_id ) {
            case 4:
                $data = $this->repo->forCustomer();
                break;

            case 5:
                $data = $this->repo->forStation();
                break;

            case 6:
                $data = $this->repo->forMechanic();
                break;
        }

        if( !empty($data) ) {
            return BannerResource::collection( $data );
        }

        return abort(400);
    }
}
