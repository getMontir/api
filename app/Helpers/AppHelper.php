<?php

use Illuminate\Support\Facades\Auth;

if ( !function_exists('get_system_date_format') ) :

    /**
     * Function to get date format
     *
     * @return string Date Format
     */
    function get_system_date_format() {
        return 'd F, Y';
    }
endif;

if ( !function_exists( 'get_system_time_format' ) ) :

    /**
     * Function to get time format
     *
     * @return string Time Format
     */
    function get_system_time_format() {
        return 'H:i';
    }

endif;

if ( !function_exists( 'get_system_date_time_format' ) ) :

    /**
     * Function to get date time format
     *
     * @return string Date Time Format
     */
    function get_system_date_time_format() {
        return get_system_date_format() . ' ' . get_system_time_format();
    }
endif;

if ( !function_exists( 'get_mysql_date_format' ) ) :

    /**
     * Function to get mysql date format
     *
     * @return string Date Format
     */
    function get_mysql_date_format() {
        return 'Y-m-d';
    }
endif;

if ( !function_exists( 'get_mysql_time_format' ) ) :

    /**
     * Function to get mysql time format
     *
     * @return string Time Format
     */
    function get_mysql_time_format() {
        return 'H:i:s';
    }
endif;

if ( !function_exists( 'get_mysql_date_time_format' ) ) :

    /**
     * Function to get mysql date time format
     *
     * @return string Date Time Format
     */
    function get_mysql_date_time_format() {
        return get_mysql_date_format() . ' ' . get_mysql_time_format();
    }
endif;

if ( !function_exists( 'get_carbon_format' ) ) :

    /**
     * Funciton to get format for carbon class
     *
     * @return string Date Time Format
     */
    function get_carbon_format() {
        return 'd/m/Y H:i:s';
    }
endif;

if ( !function_exists( 'get_notification_platform' ) ) :

    /**
     * Function to get notification platform
     *
     * @return array
     */
    function get_notification_platform() {
        return ['database'];
    }
endif;

if ( !function_exists( '__' ) ) :

    /**
     * Function to convert empty string to strip text
     *
     * @param string $text String to be converted
     * @return string
     */
    function __( $text ) {
        if( empty($text) ) {
            return '-';
        }

        return $text;
    }
endif;

if ( !function_exists( '_e' ) ) :

    /**
     * Function to print empty string to strip text
     *
     * @param string $text String to be converted
     * @return void
     */
    function _e( $text ) {
        echo __($text);
    }
endif;

if ( !function_exists( '_default_image' ) ) :

    /**
     * Function to get default image paramater
     *
     * @return array
     */
    function _default_image() {
        return [
            'name' => 'Default',
            'slug' => 'default',
            'filename' => 'default',
            'url' => asset('images/default.jpg'),
            'extension' => 'jpg',
            'exntension' => 'jpg',
            'mime' => 'image/jpeg',
        ];
    }
endif;

if ( !function_exists( '_format_number' ) ) {

    /**
     * Format number to string
     * 
     * @param Int $number
     * @return String
     */
    function _format_number( $number ) {
        return number_format( $number, 0, ',', '.' );
    }
}

if ( !function_exists( '_format_currency' ) ) {

    /**
     * Format number to currency
     * 
     * @param Int $number
     * @param String $currency
     * @return String
     */
    function _format_currency( $number, $currency = 'Rp ' ) {
        $number = _format_number( $number );
        return $currency . $number;
    }
}

if ( !function_exists( '_format_duration' ) ) {

    /**
     * Format number to duration hours and minutes
     * 
     * @param Int $number
     * @return String
     */
    function _format_duration( $number ) {
        $hours = floor( $number / 60 );
        $minutes = floor( $number % 60 );
        $result = [];

        if( $hours > 0 ) {
            if( $hours == 1 ) {
                $result[] = __('app.clock.hour', ['hour' => $hours]);
            } else {
                $result[] = __('app.clock.hours', ['hour' => $hours]);
            }
        }
        
        if( $minutes > 0 ) {
            if( $minutes == 1 ) {
                $result[] = __('app.clock.minute', ['minute' => $minutes]);
            } else {
                $result[] = __('app.clock.minutes', ['minute' => $minutes]);
            }
        }

        $result = implode( ' ', $result );

        return $result;
    }
}

if ( !function_exists('_current_language') ) :

    function _current_language() {
        if( Auth::check() ) {
            return strtolower(Auth::user()->setting->language);
        } else {
            return 'id';
        }
    }
endif;

if ( !function_exists('_user_initial') ) {

    function _user_initial( $name = '' ) {
        if( empty($name) ) {
            $user = Auth::user();
            $name = $user->fullname;
        }

        $words = explode(' ', $name);
        if (count($words) >= 2) {
            return strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
        }

        preg_match_all('#([A-Z]+)#', $name, $capitals);

        if (count($capitals[1]) >= 2) {
            return substr(implode('', $capitals[1]), 0, 2);
        }

        return strtoupper(substr($name, 0, 2));
    }
}

if ( !function_exists('_initial') ) {

    function _initial( $name ) {
        $words = explode(' ', $name);
        if (count($words) >= 2) {
            return strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
        }

        preg_match_all('#([A-Z]+)#', $name, $capitals);

        if (count($capitals[1]) >= 2) {
            return substr(implode('', $capitals[1]), 0, 2);
        }

        return strtoupper(substr($name, 0, 2));
    }
}

if ( !function_exists('_announcement_types') ) {

    function _announcement_types() {
        $lang = _current_language();

        if( $lang == 'en' ) {
            $items = [
                [
                    'id' => 'info',
                    'text' => 'Information'
                ],
                [
                    'id' => 'warning',
                    'text' => 'Warning'
                ],
                [
                    'id' => 'danger',
                    'text' => 'Danger'
                ]
            ];
        } else {
            $items = [
                [
                    'id' => 'info',
                    'text' => 'Informasi'
                ],
                [
                    'id' => 'warning',
                    'text' => 'Peringatan'
                ],
                [
                    'id' => 'danger',
                    'text' => 'Bahaya'
                ]
            ];
        }

        return $items;
    }
}