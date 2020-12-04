<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckUpdateController extends Controller
{
    public function customer( Request $request ) {
        $request->validate([
            'req_version' => 'required|numeric'
        ]);

        $currentVersion = config('version.customer', 10);
        $requestVersion = $request->input('req_version', 10);

        if( $currentVersion > $requestVersion ) {
            return response()->json([
                'data' => true
            ]);
        }

        return response()->json([
            'data' => false
        ]);
    }

    public function station( Request $request ) {
        $request->validate([
            'req_version' => 'required|numeric'
        ]);

        $currentVersion = config('version.station', 1);
        $requestVersion = $request->input('req_version', 1);

        if( $currentVersion > $requestVersion ) {
            return response()->json([
                'data' => true
            ]);
        }

        return response()->json([
            'data' => false
        ]);
    }
}
