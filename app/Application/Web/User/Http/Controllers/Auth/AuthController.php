<?php

namespace App\Application\Web\User\Http\Controllers\Auth;

use App\Domains\User\User;
use App\Core\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{

    use AuthenticatesAndRegistersUsers;

    protected $guard                = 'user';
    protected $redirectTo           = '/user';
    protected $redirectAfterLogout  = '/user';
    protected $loginView            = 'user::auth.login';
    protected $registerView         = 'user::auth.register';
    protected $user;

    public function __construct(User $user)
    {
        $this->middleware('guest:'.$this->guard, ['except' => 'logout']);
        $this->user = $user;
    }

    protected function validator(array $data)
    {
        return \Validator::make($data, [
            'first_name'=> 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    protected function create(array $data)
    {
        return $this->user->create([
            'first_name'=> $data['first_name'],
            'last_name' => $data['last_name'],
            'email'     => $data['email'],
            'password'  => bcrypt($data['password']),
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
