<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Repository\Eloquent\UserRepository;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $userRepo;

    public function __construct(
        UserRepository $a
    ) {
        $this->userRepo = $a;
    }

    public function profile() {
        return new UserResource(
            $this->userRepo->profile()
        );
    }
}
