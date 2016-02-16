<?php

Route::get('/',           ['as' =>'index'  , 'uses' => 'ProfileController@index' ]);
Route::get('/create',     ['as' =>'create' , 'uses' => 'ProfileController@create']);
Route::post('/store',     ['as' =>'store'  , 'uses' => 'ProfileController@store' ]);
Route::get('/show/{id}',  ['as' =>'show'   , 'uses' => 'ProfileController@show'  ]);
Route::get('{id}/edit',   ['as' =>'edit'   , 'uses' => 'ProfileController@edit'  ]);
Route::post('{id}/update',['as' =>'update' , 'uses' => 'ProfileController@update']);
Route::get('{id}/delete', ['as' =>'delete' , 'uses' => 'ProfileController@delete']);