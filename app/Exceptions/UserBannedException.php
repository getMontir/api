<?php

namespace App\Exceptions;

use Exception;

class UserBannedException extends Exception
{
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
        // return response()->json([
        //     'code' => 400,
        //     'message' => __('auth.banned')
        // ]);
        // $handler = new Exception( __('auth.banned') );
        // parent::report( $handler );
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response()->json([
            'code' => 400,
            'message' => __('auth.banned')
        ]);
    }
}
