<?php

use Hashids\Hashids;

if ( !function_exists( '_encode' ) ) :

    /**
     * Function to make hash from text
     *
     * @param int $text String to be hashed
     * @param string $name Hash identifier
     * @param int $length Length of hash
     * @param string $rule Hash rule
     * @return string Hashed text
     */
    function _encode( $text, $name = 'Paperplane', $length = 20, $rule = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890' ) {

        // Init hash
        $hash = new Hashids( $name, $length, $rule );

        // Return encoded text
        return $hash->encode( $text );
    }
endif;

if ( !function_exists( '_decode' ) ) :

    /**
     * Function to decode hash
     *
     * @param string $text String to be hashed
     * @param string $name Hash identifier
     * @param int $length Length of hash
     * @param string $rule Hash rule
     * @return string Decoded hash
     */
    function _decode( $text, $name = 'Paperplane', $length = 20, $rule = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890' ) {

        // Init hash
        $hash = new Hashids($name, $length, $rule);

        // Return decoded text
        $result = $hash->decode( $text );

        if ( count( $result ) <= 0 ) {
            return false;
        }

        return $result[0];
    }
endif;

if ( !function_exists( '_encode_attachment' ) ) :
    function _encode_attachment( int $id ) {
        return _encode( $id, 'getmontir-attachment' );
    }
endif;

if ( !function_exists( '_decode_attachment' ) ) :
    function _decode_attachment( string $hash ) {
        return _decode( $hash, 'getmontir-attachment' );
    }
endif;

if ( !function_exists( '_encode_category' ) ) :
    function _encode_category( int $id ) {
        return _encode( $id, 'getmontir-category' );
    }
endif;

if ( !function_exists( '_decode_category' ) ) :
    function _decode_category( string $hash ) {
        return _decode( $hash, 'getmontir-category' );
    }
endif;

if ( !function_exists( '_encode_city' ) ) :
    function _encode_city( int $id ) {
        return _encode( $id, 'getmontir-city' );
    }
endif;

if ( !function_exists( '_decode_city' ) ) :
    function _decode_city( string $hash ) {
        return _decode( $hash, 'getmontir-city' );
    }
endif;

if ( !function_exists( '_encode_customer_detail') ) :
    function _encode_customer_detail( int $id ) {
        return _encode( $id, 'getmontir-customer-detail');
    }
endif;

if ( !function_exists( '_decode_customer_detail' ) ) :
    function _decode_customer_detail( string $hash ) {
        return _decode( $hash, 'getmontir-customer-detail' );
    }
endif;

if ( !function_exists( '_encode_customer_vehicle') ) :
    function _encode_customer_vehicle( int $id ) {
        return _encode( $id, 'getmontir-customer-vehicle');
    }
endif;

if ( !function_exists( '_decode_customer_vehicle' ) ) :
    function _decode_customer_vehicle( string $hash ) {
        return _decode( $hash, 'getmontir-customer-vehicle' );
    }
endif;

if ( !function_exists( '_encode_developer' ) ) :
    function _encode_developer( int $id ) {
        return _encode( $id, 'getmontir-developer' );
    }
endif;

if ( !function_exists( '_decode_developer' ) ) :
    function _decode_developer( string $hash ) {
        return _decode( $hash, 'getmontir-developer' );
    }
endif;

if ( !function_exists( '_encode_district' ) ) :
    function _encode_district( int $id ) {
        return _encode( $id, 'getmontir-district' );
    }
endif;

if ( !function_exists( '_decode_district' ) ) :
    function _decode_district( string $hash ) {
        return _decode( $hash, 'getmontir-district' );
    }
endif;

if ( !function_exists( '_encode_emergency' ) ) :
    function _encode_emergency( int $id ) {
        return _encode( $id, 'getmontir-emergency' );
    }
endif;

if ( !function_exists( '_decode_emergency' ) ) :
    function _decode_emergency( string $hash ) {
        return _decode( $hash, 'getmontir-emergency' );
    }
endif;

if ( !function_exists( '_encode_mechanic_detail' ) ) :
    function _encode_mechanic_detail( int $id ) {
        return _encode( $id, 'getmontir-mechanic_detail' );
    }
endif;

if ( !function_exists( '_decode_mechanic_detail' ) ) :
    function _decode_mechanic_detail( string $hash ) {
        return _decode( $hash, 'getmontir-mechanic_detail' );
    }
endif;

if ( !function_exists( '_encode_order' ) ) :
    function _encode_order( int $id ) {
        return _encode( $id, 'getmontir-order' );
    }
endif;

if ( !function_exists( '_decode_order' ) ) :
    function _decode_order( string $hash ) {
        return _decode( $hash, 'getmontir-order' );
    }
endif;

if ( !function_exists( '_encode_order_emergency' ) ) :
    function _encode_order_emergency( int $id ) {
        return _encode( $id, 'getmontir-order_emergency' );
    }
endif;

if ( !function_exists( '_decode_emergency' ) ) :
    function _decode_order_emergency( string $hash ) {
        return _decode( $hash, 'getmontir-order_emergency' );
    }
endif;

if ( !function_exists( '_encode_order_payment' ) ) :
    function _encode_order_payment( int $id ) {
        return _encode( $id, 'getmontir-order_payment' );
    }
endif;

if ( !function_exists( '_decode_order_payment' ) ) :
    function _decode_order_payment( string $hash ) {
        return _decode( $hash, 'getmontir-order_payment' );
    }
endif;

if ( !function_exists( '_encode_order_service' ) ) :
    function _encode_order_service( int $id ) {
        return _encode( $id, 'getmontir-order_service' );
    }
endif;

if ( !function_exists( '_decode_order_service' ) ) :
    function _decode_order_service( string $hash ) {
        return _decode( $hash, 'getmontir-order_service' );
    }
endif;

if ( !function_exists( '_encode_order_sparepart' ) ) :
    function _encode_order_sparepart( int $id ) {
        return _encode( $id, 'getmontir-order_sparepart' );
    }
endif;

if ( !function_exists( '_decode_order_sparepart' ) ) :
    function _decode_order_sparepart( string $hash ) {
        return _decode( $hash, 'getmontir-order_sparepart' );
    }
endif;

if ( !function_exists( '_encode_province' ) ) :
    function _encode_province( int $id ) {
        return _encode( $id, 'getmontir-province' );
    }
endif;

if ( !function_exists( '_decode_province' ) ) :
    function _decode_province( string $hash ) {
        return _decode( $hash, 'getmontir-province' );
    }
endif;

if ( !function_exists( '_encode_role' ) ) :
    function _encode_role( int $id ) {
        return _encode( $id, 'getmontir-role' );
    }
endif;

if ( !function_exists( '_decode_role' ) ) :
    function _decode_role( string $hash ) {
        return _decode( $hash, 'getmontir-role' );
    }
endif;

if ( !function_exists( '_encode_role_detail' ) ) :
    function _encode_role_detail( int $id ) {
        return _encode( $id, 'getmontir-role_detail' );
    }
endif;

if ( !function_exists( '_decode_role_detail' ) ) :
    function _decode_role_detail( string $hash ) {
        return _decode( $hash, 'getmontir-role_detail' );
    }
endif;

if ( !function_exists( '_encode_service' ) ) :
    function _encode_service( int $id ) {
        return _encode( $id, 'getmontir-service' );
    }
endif;

if ( !function_exists( '_decode_service' ) ) :
    function _decode_service( string $hash ) {
        return _decode( $hash, 'getmontir-service' );
    }
endif;

if ( !function_exists( '_encode_service_category' ) ) :
    function _encode_service_category( int $id ) {
        return _encode( $id, 'getmontir-service_category' );
    }
endif;

if ( !function_exists( '_decode_service_category' ) ) :
    function _decode_service_category( string $hash ) {
        return _decode( $hash, 'getmontir-service_category' );
    }
endif;

if ( !function_exists( '_encode_setting' ) ) :
    function _encode_setting( int $id ) {
        return _encode( $id, 'getmontir-setting' );
    }
endif;

if ( !function_exists( '_decode_setting' ) ) :
    function _decode_setting( string $hash ) {
        return _decode( $hash, 'getmontir-setting' );
    }
endif;

if ( !function_exists( '_encode_sparepart' ) ) :
    function _encode_sparepart( int $id ) {
        return _encode( $id, 'getmontir-sparepart' );
    }
endif;

if ( !function_exists( '_decode_sparepart' ) ) :
    function _decode_sparepart( string $hash ) {
        return _decode( $hash, 'getmontir-sparepart' );
    }
endif;

if ( !function_exists( '_encode_sparepart_brand' ) ) :
    function _encode_sparepart_brand( int $id ) {
        return _encode( $id, 'getmontir-sparepart_brand' );
    }
endif;

if ( !function_exists( '_decode_sparepart_brand' ) ) :
    function _decode_sparepart_brand( string $hash ) {
        return _decode( $hash, 'getmontir-sparepart_brand' );
    }
endif;

if ( !function_exists( '_encode_sparepart_category' ) ) :
    function _encode_sparepart_category( int $id ) {
        return _encode( $id, 'getmontir-sparepart_category' );
    }
endif;

if ( !function_exists( '_decode_sparepart_category' ) ) :
    function _decode_sparepart_category( string $hash ) {
        return _decode( $hash, 'getmontir-sparepart_category' );
    }
endif;

if ( !function_exists( '_encode_station_detail' ) ) :
    function _encode_station_detail( int $id ) {
        return _encode( $id, 'getmontir-station_detail' );
    }
endif;

if ( !function_exists( '_decode_station_detail' ) ) :
    function _decode_station_detail( string $hash ) {
        return _decode( $hash, 'getmontir-station_detail' );
    }
endif;

if ( !function_exists( '_encode_station_document' ) ) :
    function _encode_station_document( int $id ) {
        return _encode( $id, 'getmontir-station_document' );
    }
endif;

if ( !function_exists( '_decode_station_document' ) ) :
    function _decode_station_document( string $hash ) {
        return _decode( $hash, 'getmontir-station_document' );
    }
endif;

if ( !function_exists( '_encode_station_mechanic' ) ) :
    function _encode_station_mechanic( int $id ) {
        return _encode( $id, 'getmontir-station_mechanic' );
    }
endif;

if ( !function_exists( '_decode_station_mechanic' ) ) :
    function _decode_station_mechanic( string $hash ) {
        return _decode( $hash, 'getmontir-station_mechanic' );
    }
endif;

if ( !function_exists( '_encode_station_personal_detail' ) ) :
    function _encode_station_personal_detail( int $id ) {
        return _encode( $id, 'getmontir-station_personal_detail' );
    }
endif;

if ( !function_exists( '_decode_station_personal_detail' ) ) :
    function _decode_station_personal_detail( string $hash ) {
        return _decode( $hash, 'getmontir-station_personal_detail' );
    }
endif;

if ( !function_exists( '_encode_user' ) ) :
    function _encode_user( int $id ) {
        return _encode( $id, 'getmontir-user' );
    }
endif;

if ( !function_exists( '_decode_user' ) ) :
    function _decode_user( string $hash ) {
        return _decode( $hash, 'getmontir-user' );
    }
endif;

if ( !function_exists( '_encode_user_detail' ) ) :
    function _encode_user_detail( int $id ) {
        return _encode( $id, 'getmontir-user_detail' );
    }
endif;

if ( !function_exists( '_decode_user_detail' ) ) :
    function _decode_user_detail( string $hash ) {
        return _decode( $hash, 'getmontir-user_detail' );
    }
endif;

if ( !function_exists( '_encode_vehicle_brand' ) ) :
    function _encode_vehicle_brand( int $id ) {
        return _encode( $id, 'getmontir-vehicle_brand' );
    }
endif;

if ( !function_exists( '_decode_vehicle_brand' ) ) :
    function _decode_vehicle_brand( string $hash ) {
        return _decode( $hash, 'getmontir-vehicle_brand' );
    }
endif;

if ( !function_exists( '_encode_vehicle_class' ) ) :
    function _encode_vehicle_class( int $id ) {
        return _encode( $id, 'getmontir-vehicle_class' );
    }
endif;

if ( !function_exists( '_decode_vehicle_class' ) ) :
    function _decode_vehicle_class( string $hash ) {
        return _decode( $hash, 'getmontir-vehicle_class' );
    }
endif;

if ( !function_exists( '_encode_vehicle_engine' ) ) :
    function _encode_vehicle_engine( int $id ) {
        return _encode( $id, 'getmontir-vehicle_engine' );
    }
endif;

if ( !function_exists( '_decode_vehicle_engine' ) ) :
    function _decode_vehicle_engine( string $hash ) {
        return _decode( $hash, 'getmontir-vehicle_engine' );
    }
endif;

if ( !function_exists( '_encode_vehicle_transmission' ) ) :
    function _encode_vehicle_transmission( int $id ) {
        return _encode( $id, 'getmontir-vehicle_transmission' );
    }
endif;

if ( !function_exists( '_decode_vehicle_transmission' ) ) :
    function _decode_vehicle_transmission( string $hash ) {
        return _decode( $hash, 'getmontir-vehicle_transmission' );
    }
endif;

if ( !function_exists( '_encode_vehicle_type' ) ) :
    function _encode_vehicle_type( int $id ) {
        return _encode( $id, 'getmontir-vehicle_type' );
    }
endif;

if ( !function_exists( '_decode_vehicle_type' ) ) :
    function _decode_vehicle_type( string $hash ) {
        return _decode( $hash, 'getmontir-vehicle_type' );
    }
endif;

if ( !function_exists( '_encode_station_service' ) ) :
    function _encode_station_service( int $id ) {
        return _encode( $id, 'getmontir-station_service' );
    }
endif;

if ( !function_exists( '_decode_station_service' ) ) :
    function _decode_station_service( string $hash ) {
        return _decode( $hash, 'getmontir-station_service' );
    }
endif;

if ( !function_exists( '_encode_station_sparepart' ) ) :
    function _encode_station_sparepart( int $id ) {
        return _encode( $id, 'getmontir-station_sparepart' );
    }
endif;

if ( !function_exists( '_decode_station_sparepart' ) ) :
    function _decode_station_sparepart( string $hash ) {
        return _decode( $hash, 'getmontir-station_sparepart' );
    }
endif;

if ( !function_exists( '_encode_station_emergency' ) ) :
    function _encode_station_emergency( int $id ) {
        return _encode( $id, 'getmontir-station_emergency' );
    }
endif;

if ( !function_exists( '_decode_station_emergency' ) ) :
    function _decode_station_emergency( string $hash ) {
        return _decode( $hash, 'getmontir-station_emergency' );
    }
endif;

if ( !function_exists( '_encode_announcement' ) ) :
    function _encode_announcement( int $id ) {
        return _encode( $id, 'getmontir-announcement' );
    }
endif;

if ( !function_exists( '_decode_announcement' ) ) :
    function _decode_announcement( string $hash ) {
        return _decode( $hash, 'getmontir-announcement' );
    }
endif;

if ( !function_exists( '_encode_announcement_customer' ) ) :
    function _encode_announcement_customer( int $id ) {
        return _encode( $id, 'getmontir-announcement_customer' );
    }
endif;

if ( !function_exists( '_decode_announcement_customer' ) ) :
    function _decode_announcement_customer( string $hash ) {
        return _decode( $hash, 'getmontir-announcement_customer' );
    }
endif;

if ( !function_exists( '_encode_announcement_mechanic' ) ) :
    function _encode_announcement_mechanic( int $id ) {
        return _encode( $id, 'getmontir-announcement_mechanic' );
    }
endif;

if ( !function_exists( '_decode_announcement_mechanic' ) ) :
    function _decode_announcement_mechanic( string $hash ) {
        return _decode( $hash, 'getmontir-announcement_mechanic' );
    }
endif;

if ( !function_exists( '_encode_announcement_station' ) ) :
    function _encode_announcement_station( int $id ) {
        return _encode( $id, 'getmontir-announcement_station' );
    }
endif;

if ( !function_exists( '_decode_announcement_station' ) ) :
    function _decode_announcement_station( string $hash ) {
        return _decode( $hash, 'getmontir-announcement_station' );
    }
endif;

if ( !function_exists( '_encode_banner_customer' ) ) :
    function _encode_banner_customer( int $id ) {
        return _encode( $id, 'getmontir-banner_customer' );
    }
endif;

if ( !function_exists( '_decode_banner_customer' ) ) :
    function _decode_banner_customer( string $hash ) {
        return _decode( $hash, 'getmontir-banner_customer' );
    }
endif;

if ( !function_exists( '_encode_banner' ) ) :
    function _encode_banner( int $id ) {
        return _encode( $id, 'getmontir-banner' );
    }
endif;

if ( !function_exists( '_decode_banner' ) ) :
    function _decode_banner( string $hash ) {
        return _decode( $hash, 'getmontir-banner' );
    }
endif;

if ( !function_exists( '_encode_banner_station' ) ) :
    function _encode_banner_station( int $id ) {
        return _encode( $id, 'getmontir-banner_station' );
    }
endif;

if ( !function_exists( '_decode_banner_station' ) ) :
    function _decode_banner_station( string $hash ) {
        return _decode( $hash, 'getmontir-banner_station' );
    }
endif;

if ( !function_exists( '_encode_banner_mechanic' ) ) :
    function _encode_banner_mechanic( int $id ) {
        return _encode( $id, 'getmontir-banner_mechanic' );
    }
endif;

if ( !function_exists( '_decode_banner_mechanic' ) ) :
    function _decode_banner_mechanic( string $hash ) {
        return _decode( $hash, 'getmontir-banner_mechanic' );
    }
endif;

if ( !function_exists( '_encode_popup_customer' ) ) :
    function _encode_popup_customer( int $id ) {
        return _encode( $id, 'getmontir-popup_customer' );
    }
endif;

if ( !function_exists( '_decode_popup_customer' ) ) :
    function _decode_popup_customer( string $hash ) {
        return _decode( $hash, 'getmontir-popup_customer' );
    }
endif;

if ( !function_exists( '_encode_popup_station' ) ) :
    function _encode_popup_station( int $id ) {
        return _encode( $id, 'getmontir-popup_station' );
    }
endif;

if ( !function_exists( '_decode_popup_station' ) ) :
    function _decode_popup_station( string $hash ) {
        return _decode( $hash, 'getmontir-popup_station' );
    }
endif;

if ( !function_exists( '_encode_popup_mechanic' ) ) :
    function _encode_popup_mechanic( int $id ) {
        return _encode( $id, 'getmontir-popup_mechanic' );
    }
endif;

if ( !function_exists( '_decode_popup_mechanic' ) ) :
    function _decode_popup_mechanic( string $hash ) {
        return _decode( $hash, 'getmontir-popup_mechanic' );
    }
endif;

if ( !function_exists( '_encode_mechanic_service' ) ) :
    function _encode_mechanic_service( int $id ) {
        return _encode( $id, 'getmontir-mechanic_service' );
    }
endif;

if ( !function_exists( '_decode_mechanic_service' ) ) :
    function _decode_mechanic_service( string $hash ) {
        return _decode( $hash, 'getmontir-mechanic_service' );
    }
endif;

if ( !function_exists( '_encode_mechanic_sparepart' ) ) :
    function _encode_mechanic_sparepart( int $id ) {
        return _encode( $id, 'getmontir-mechanic_sparepart' );
    }
endif;

if ( !function_exists( '_decode_mechanic_sparepart' ) ) :
    function _decode_mechanic_sparepart( string $hash ) {
        return _decode( $hash, 'getmontir-mechanic_sparepart' );
    }
endif;

if ( !function_exists( '_encode_mechanic_emergency' ) ) :
    function _encode_mechanic_emergency( int $id ) {
        return _encode( $id, 'getmontir-mechanic_emergency' );
    }
endif;

if ( !function_exists( '_decode_mechanic_emergency' ) ) :
    function _decode_mechanic_emergency( string $hash ) {
        return _decode( $hash, 'getmontir-mechanic_emergency' );
    }
endif;

if ( !function_exists( '_encode_payment_method' ) ) :
    function _encode_payment_method( int $id ) {
        return _encode( $id, 'getmontir-payment_method' );
    }
endif;

if ( !function_exists( '_decode_payment_method' ) ) :
    function _decode_payment_method( string $hash ) {
        return _decode( $hash, 'getmontir-payment_method' );
    }
endif;

if ( !function_exists( '_encode_payment' ) ) :
    function _encode_payment( int $id ) {
        return _encode( $id, 'getmontir-payment' );
    }
endif;

if ( !function_exists( '_decode_payment' ) ) :
    function _decode_payment( string $hash ) {
        return _decode( $hash, 'getmontir-payment' );
    }
endif;

if ( !function_exists( '_encode_otp' ) ) :
    function _encode_otp( int $id ) {
        return _encode( $id, 'getmontir-otp_code' );
    }
endif;

if ( !function_exists( '_decode_otp' ) ) :
    function _decode_otp( string $hash ) {
        return _decode( $hash, 'getmontir-otp_code' );
    }
endif;