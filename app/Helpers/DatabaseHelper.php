<?php

if ( !function_exists('_user_type_system_user') ) :
    function _user_type_system_user() {
        return 1;
    }
endif;

if ( !function_exists('_user_type_customer') ) :
    function _user_type_customer() {
        return 2;
    }
endif;

if ( !function_exists('_user_type_station') ) :
    function _user_type_station() {
        return 3;
    }
endif;

if ( !function_exists('_user_type_mechanic') ) :
    function _user_type_mechanic() {
        return 4;
    }
endif;

if ( !function_exists('_user_type_store') ) :
    function _user_type_store() {
        return 5;
    }
endif;