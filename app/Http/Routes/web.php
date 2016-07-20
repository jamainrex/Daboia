<?php

Route::group( [ 'middleware' => 'web' ],
    function() {

        // Login/Main Page
        Route::get( '/', [ 'as' => 'home', 'uses' => 'AuthenticateController@index', 'middleware' => 'guest' ] );

    }
);