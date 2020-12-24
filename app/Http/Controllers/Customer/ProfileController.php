<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\DetailCustomerResource;
use App\Http\Resources\UserResource;
use App\Repository\Eloquent\ProfileCustomerRepository;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $profileRepo;

    public function __construct(
        ProfileCustomerRepository $a
    ) {
        $this->profileRepo = $a;
    }

    public function user( Request $request ) {
        return new DetailCustomerResource(
            $this->profileRepo->profile()
        );
    }

    public function verify( Request $request ) {}

    public function update( Request $request ) {}

    public function password( Request $request ) {}

}
