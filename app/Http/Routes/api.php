<?php

Route::group( [ 'prefix' => 'api', 'middleware' => 'api' ],
    function() {

        Route::group(['prefix' => 'authenticate', 'namespace' => 'Api'], // OK
            function () {
                Route::post('/', ['as' => 'api.authenticate', 'uses' => 'AuthenticateController@authenticate']);
                Route::post('register', ['as' => 'api.register', 'uses' => 'AuthenticateController@register']);
            }
        );

    }
);