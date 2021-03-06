<?php

use App\Models\Otp;
use Carbon\Carbon;

if( !function_exists('generateOtpString') ) {
    function generateOtpString($length = 5) {
        /*$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }*/
        $randomString = rand(100000, 999999);

        $find = Otp::checkOtp($randomString)->first();
        if( $find != null ) {
            if( $find->is_expired == 1 ) {
                return $randomString;
            } else {
                return generateOtpString();
            }
        }
        
        return $randomString;
    }
}

function createOtpCode( $email, $user, $type, $expiredMinutes = 5 ) {
	$column = '';

	$now = Carbon::now();
    $exp = $now->addMinutes( $expiredMinutes );

    $code = generateOtpString();
    $data = [
    	'email' => $email,
    ];
	$otp = Otp::create([
		'code' => $code,
		'expired' => $exp,
		'data' => json_encode($data),
 	]);

	$otp->user_id = $user->id;
    $column = 'user_id';
    
    $otp->type = $type;

	$otp->save();

	Otp::where($column, $user->id)->where('id', '!=', $otp->id)->update([
		'is_used' => 1,
	]);

	Otp::where($column, $user->id)->where('id', '!=', $otp->id)->delete();

	return $otp;
}
