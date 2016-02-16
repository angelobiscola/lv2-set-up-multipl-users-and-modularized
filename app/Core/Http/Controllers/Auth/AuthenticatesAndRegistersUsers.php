<?php namespace App\Core\Http\Controllers\Auth;

use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Http\Request;

trait AuthenticatesAndRegistersUsers
{

    public function __construct()
    {
        $this->middleware('guest:'.$this->getAttribute('guard'), ['except' => 'logout']);
    }

    public function showFormLogin()
    {
        return $this->showView($this->getAttribute('formLogin'));
    }

    public function login(Request $request, Auth $auth)
    {
        $validator = \Validator::make($request->only('email', 'password'),

            [
                'email'    => 'required|email',
                'password' => 'required'
            ]
        );

        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }

        if ($auth->guard($this->getAttribute('guard'))->attempt($request->only('email', 'password'),1))
        {
            return redirect()->intended($this->getAttribute('redirectTo'));
        }

        return back()->withInput()->withErrors(['email' => 'These credentials do not match our records.']);
    }

    public function showFormRegister()
    {
        return $this->showView($this->getAttribute('formRegister'));
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::guard($this->getGuard())->login($this->create($request->all()));

        return redirect($this->redirectPath());
    }


    public function logout(Auth $auth)
    {
        $auth->guard($this->getAttribute('guard'))->logout();
        return redirect('/'.$this->getAttribute('guard'));
    }


    public function showResetForm(Request $request, $token = null)
    {
        if (is_null($token)) {
            return $this->getEmail();
        }

        $email = $request->input('email');

        if (property_exists($this, 'resetView')) {
            return view($this->resetView)->with(compact('token', 'email'));
        }

        if (view()->exists('auth.passwords.reset')) {
            return view('auth.passwords.reset')->with(compact('token', 'email'));
        }

        return view('auth.reset')->with(compact('token', 'email'));
    }



    protected function showView($view)
    {
        if (view()->exists($view)) {

            return view($view);
        }
        else
        {
            throw new \Exception ('Undefined view');
        }
    }

    protected function getAttribute($attribute)
    {
        if (property_exists($this, $attribute) )
        {
            return $this->$attribute;
        }
        else
        {
           throw new \Exception ('Attribute: "'.$attribute .'" undefined');
        }
    }
}