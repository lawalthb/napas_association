<!DOCTYPE html>
<html>

<head>
  <title>{{ __('Verify Email Address') }}</title>
</head>

<body>
  <p>{{ __('Hello') }} {{ $user-firstname }},</p>
  <p>{{ __('Hello') }} {{ $user->checkoutLink }},</p>

  <p>{{ __('Please click the button below to verify your email address.') }}</p>

  <a href="{{ $verificationUrl }}" style="display: inline-block; padding: 10px 20px; background-color: #3490dc; color: white; text-decoration: none; border-radius: 5px;">
    {{ __('Verify Email Address') }}
  </a>

  <p>{{ __('If you did not create an account, no further action is required.') }}</p>

  <p>{{ __('Regards,') }}<br>{{ config('app.name') }}</p>
</body>

</html>