<?php

Route::get('/', ['middleware' => 'auth:user', 'as' =>'home.index', 'uses' => 'HomeController@index']);