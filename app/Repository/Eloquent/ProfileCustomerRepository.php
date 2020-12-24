<?php

namespace App\Repository\Eloquent;

use App\Models\CustomerDetail;
use App\Models\User;
use App\Repository\ProfileCustomerRepoInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileCustomerRepository extends BaseRepository implements ProfileCustomerRepoInterface {

    public function __construct( CustomerDetail $model ) {
        parent::__construct($model);
    }

    public function profile(): ?Model {
        $user = Auth::user();
        $detail = CustomerDetail::where('user_id', $user->id)
            ->with('province', 'city', 'district', 'customerVehicles')
            ->first();
        return $detail;
    }

    public function verify(): ?Model {
        return null;
    }

    public function information(Request $request): ?Model {
        return null;
    }

    public function changePassword(): ?Model {
        return null;
    }
}