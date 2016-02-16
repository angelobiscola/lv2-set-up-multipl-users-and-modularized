<?php

namespace App\Application\Web\Admin\Http\Controllers\Auth;

use App\Application\Web\Admin\Http\Controllers\BaseController;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends BaseController
{
    use ResetsPasswords;

    protected $guard            = 'admin';
    protected $broker           = 'admin';
    protected $linkRequestView  = 'admin::auth.passwords.email';
    protected $resetView        = 'admin::auth.passwords.reset';
    protected $redirectTo       = '/admin';
    //protected $subject          = 'Link de reset da sua senha';
}