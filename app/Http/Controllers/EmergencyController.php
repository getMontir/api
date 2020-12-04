<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmergencyResource;
use App\Repository\Eloquent\EmergencyRepository;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    protected $emergencyRepo;

    public function __construct(
        EmergencyRepository $a
    ) {
        $this->emergencyRepo = $a;
    }

    public function index() {
        return EmergencyResource::collection(
            $this->emergencyRepo->all()
        );
    }

}
