<?php
namespace App\Application\Web\Admin\Http\Controllers;


class HomeController extends BaseController
{

    public function index()
    {
        return view('admin::home');
    }

}

