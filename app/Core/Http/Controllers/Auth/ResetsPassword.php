<?php namespace App\Core\Http\Controllers\Auth;

use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Http\Request;

trait ResetsPassword
{

    public function __construct()
    {
        $this->middleware('guest:'.$this->getAttribute('guard'));
    }

    public function showFormEmail()
    {
        return view($this->getAttribute('formEmail'))->with(compact('token', 'email'));
    }

    public function showFormReset(Request $request, $token = null)
    {
        if (is_null($token)) {
            return $this->showFormEmail();
        }

        $email = $request->input('email');
        return view($this->getAttribute('formReset'))->with(compact('token', 'email'));
    }

    public function postEmail(Request $request)
    {
        return $this->sendResetLinkEmail($request);
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        $broker = $this->getBroker();

        $response = Password::broker($broker)->sendResetLink($request->only('email'), function (Message $message) {
            $message->subject($this->getEmailSubject());
        });

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return $this->getSendResetLinkEmailSuccessResponse($response);

            case Password::INVALID_USER:
            default:
                return $this->getSendResetLinkEmailFailureResponse($response);
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
