<?php

namespace Daboia\Handlers;

use Carbon\Carbon;

class DateHandler {

    public static function standardDateFormat( $value )
    {
        return ( new Carbon( $value ) )->format( 'd F, Y' );
    }

    public static function dateMonthYearFormat( $value )
    {
        return ( new Carbon( $value ) )->format( 'd/m/y' );
    }

}