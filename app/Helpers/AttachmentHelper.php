<?php
use App\Models\Attachment;

if ( !function_exists( 'get_attachment_from_file' ) ) :

    /**
     * Function to get url attachment from Attachment object
     *
     * @param App\Models\Attachment $file Attachment objet
     * @return string URL Attachment
     */
    function get_attachment_from_file( Attachment $file ) {
        $name = $file->filename;
        $type = ".".$file->extension;

        return url('attachment/' . $name . $type );
    }
endif;

if ( !function_exists( 'get_attachment_from_id' ) ) :

    /**
     * Function to get url attachment fmor id attachment
     *
     * @param int $id Attachment id
     * @return string URL Attachment
     */
    function get_attachment_from_id( int $id ) {
        $find = Attachment::where('id', $id)->first();

        if( empty($find) ) {
            // Return default image
            abort(404);
            return;
        }

        return get_attachment_from_file( $find );
    }
endif;
