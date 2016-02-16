<?php

namespace App\Application\Web\Admin\Http\Controllers\Auth;

use App\Application\Web\Admin\Http\Controllers\BaseController;
use App\Domains\Admin\Admin;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends BaseController
{

    use AuthenticatesAndRegistersUsers;

    protected $guard                = 'admin';
    protected $redirectTo           = '/admin';
    protected $redirectAfterLogout  = '/admin';
    protected $loginView            = 'admin::auth.login';
    protected $registerView         = 'admin::auth.register';
    protected $admin;

    public function __construct(Admin $admin)
    {
        $this->middleware('guest:'.$this->guard, ['except' => 'logout']);
        $this->admin = $admin;
    }


    protected function validator(array $data)
    {
        return \Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    protected function create(array $data)
    {
        return $this->admin->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
        ]);
    }

    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (\Auth::guard($this->guard)->once($credentials)) {
            return \Auth::guard($this->guard)->user()->id;
        }
        return false;
    }

}
