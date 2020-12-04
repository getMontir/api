<?php

namespace App\Http\Controllers;

use App\Repository\Eloquent\NotificationRepository;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    protected $repo;

    public function __construct(
        NotificationRepository $a
    ) {
        $this->repo = $a;
    }

    public function check() {
        return response()->json([
            'data' => $this->repo->check()
        ]);
    }

    public function all() {
        return response()->json([
            'data' => $this->repo->all()
        ]);
    }
}
