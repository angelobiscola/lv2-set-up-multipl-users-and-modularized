<?php


    Route::get('/',        ['as' =>'index' , 'uses' => 'AuthController@showLoginForm']);
    Route::post('/login',  ['as' =>'login' , 'uses' => 'AuthController@login']);
    Route::get('/logout',  ['as' =>'logout', 'uses' => 'AuthController@logout']);


    Route::group(['prefix' => 'register','as' => 'register.'], function() {

        Route::get ('/',     ['as' =>'index', 'uses' => 'AuthController@showRegistrationForm'  ]);
        Route::post('/store',['as' =>'store', 'uses' => 'AuthController@register' ]);
    });

    Route::group(['prefix' => 'password','as' => 'password.'], function() {

        Route::post('/email',         ['as' =>'email',  'uses' => 'PasswordController@sendResetLinkEmail']);
        Route::get ('/reset/{token?}',['as' =>'reset',  'uses' => 'PasswordController@showResetForm'     ]);
        Route::post('/reset',         ['as' =>'update', 'uses' => 'PasswordController@reset'             ]);
    });


