<?php

namespace App\Application\Web\User\Http\Controllers;


class HomeController extends BaseController
{

    public function index()
    {
        return view('user::home');
    }
}

