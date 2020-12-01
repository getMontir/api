<?php

namespace App\Http\Middleware;

use App\Models\Developer;
use Closure;
use Illuminate\Http\Request;

class RoleRestriction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $headerName = 'x-g-access-token';
        if( !$request->hasHeader($headerName) ) {
            return abort(417);
        }

        $accessToken = $request->header( $headerName );
        $find = Developer::where('dev_public_key', $accessToken)->first();
        if( !empty($find) ) {
            $scope = unserialize( $find->scope );
            $r = $scope['role'];
            if( !empty($roles) ) {
                if( is_array($roles) ) {
                    $count = 0;
                    foreach( $roles as $role ) {
                        if( in_array($role, $r)) {
                            $count++;
                        }
                    }
                    if( $count > 0 ) {
                        return $next($request);
                    }
                } else {
                    if( in_array($roles, $r) ) {
                        return $next($request);
                    }
                }
            }
        }

        return abort(417);
    }
}
