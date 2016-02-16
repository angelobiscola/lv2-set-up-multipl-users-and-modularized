Click here to reset your password: <a href="{{ $link = url('admin/auth/password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
