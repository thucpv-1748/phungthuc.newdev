<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Login Admin') }}</title>
    <link href="{{ URL::asset('bootstrap-3.3.5/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/backend/login.css') }}" rel="stylesheet" type="text/css">
</head>

<div class="form-login-admin">
    <form method="post">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
        <h1>{{ __('Login Admin') }}</h1>
        <input placeholder="{{ __('Email') }}" name="email" type="text" required="required">
        <input placeholder="{{ __('Password') }}" name="password" type="password" required="required">
        <input name="remember" type="checkbox" id="remember" value="on">
        <label for="remember">{{ __('remember me') }}</label>
        <button>{{ __('Submit') }}</button>
        {{ csrf_field() }}
    </form>
</div>
