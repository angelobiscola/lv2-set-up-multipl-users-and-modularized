<?php
namespace App\Application\Web\User\Http\Controllers;

use App\Core\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = \Auth::user();
    }

    public function getUser()
    {
        return $this->user;
    }

}
