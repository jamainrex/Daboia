<?php
use Illuminate\Support\HtmlString;
use Daboia\Handlers\DateHandler;

function pixelImage( $url = NULL, $attributes = [] )
{
    return new HtmlString( '<img src="' . route( 'api.pixel' ) . '?url=' .  $url . '"' . Html::attributes( $attributes ) . '>' );
}

function fullname( $user )
{
    return ucfirst($user->firstname).' '.ucfirst($user->lastname);
}

function encryptVal($val)
{
    return Crypt::encrypt($val);
}

function decryptVal($val)
{
    try{
        $data = Crypt::decrypt($val);
        return $data;
    }catch(\Exception $e) {
        return abort(404);
    }
}

function getCurrentDate()
{
    $mytime = Carbon::now();
    return DateHandler::standardDateFormat( $mytime->toDateTimeString() );
}

function formatDate( $date ){
    return date("Y-m-d", strtotime($date));
}