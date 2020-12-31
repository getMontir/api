<?php

namespace App\Http\Middleware;

use App\Models\Developer;
use Closure;
use Illuminate\Http\Request;

class PlatformRestriction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$platforms)
    {
        $headerName = 'x-g-access-token';
        if( !$request->hasHeader($headerName) ) {
            return abort(417);
        }

        $accessToken = $request->header( $headerName );
        $find = Developer::where('dev_public_key', $accessToken)->first();
        if( !empty($find) ) {
            $scope = unserialize( $find->scope );
            $p = $scope['platform'];
            if( !empty($platforms) ) {
                if( in_array( $p, $platforms) ) {
                    return $next($request);
                }
            } else {
                return $next($request);
            }
        }

        return abort(417, "Platform restriction");
    }
}
