<?php
Route::get('/', [ 'middleware' => ['oauth','throttle:30,1'],'as' =>'home.index', 'uses' => 'HomeController@index']);



Route::post('oauth/access_token', function() {

    return Response::json(Authorizer::issueAccessToken());

});

