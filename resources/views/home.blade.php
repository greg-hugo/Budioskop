<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="register">
        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
    </div>
    <div class="login">
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
    </div>
</body>
</html>
