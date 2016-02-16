<?php

namespace App\Application\Web\User\Http\Controllers\Auth;

use App\Application\Web\User\Http\Controllers\BaseController;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends BaseController
{
    use ResetsPasswords;

    protected $guard            = 'user';
    protected $broker           = 'user';
    protected $linkRequestView  = 'user::auth.passwords.email';
    protected $resetView        = 'user::auth.passwords.reset';
    protected $redirectTo       = '/user';
    //protected $subject          = 'Link de reset da sua senha';
}