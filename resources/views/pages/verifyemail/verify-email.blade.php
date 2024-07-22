<!DOCTYPE html>
<html>

<head>
  <title>{{ __('Verify Email Address') }}</title>
</head>


<body>
  <p>{{ __('Hello') }} {{ $name }},</p>
  <p>Use this link to make payment incase you have not pay.</p>
  <p>Your password is : {{ $password }} </p>


  <p>Please click the button below to verify your email address and make payment if you have not</p>

  <a href="{{ $payment_link }}" style="display: inline-block; padding: 10px 20px; background-color: #3490dc; color: white; text-decoration: none; border-radius: 5px;">
    Make Payment
  </a>

  <p>{{ __('If you did not create an account, no further action is required.') }}</p>

  <p>Thanks <br>{{ config('app.name') }}</p>
</body>

</html>