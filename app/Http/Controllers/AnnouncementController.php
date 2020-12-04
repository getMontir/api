<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnnouncementResource;
use App\Models\User;
use App\Repository\Eloquent\AnnouncementRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    protected $repo;

    public function __construct(
        AnnouncementRepository $a
    ) {
        $this->repo = $a;
    }

    public function index() {
        $user = Auth::user();
        switch( $user->role_id ) {
            case 4:
                return $this->customer( $user );
                break;

            case 5:
                return $this->station( $user );
                break;

            case 6:
                return $this->mechanic( $user );
                break;
        }

        return abort(400);
    }

    private function customer( User $user ) {
        return AnnouncementResource::collection(
            $this->repo->forCustomer()
        );
    }

    private function station( User $user ) {
        return AnnouncementResource::collection(
            $this->repo->forStation()
        );
    }

    private function mechanic( User $user ) {
        return AnnouncementResource::collection(
            $this->repo->forMechanic()
        );
    }

}
