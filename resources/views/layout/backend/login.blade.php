<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
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
        <h1>Login Admin</h1>
        <input placeholder="Email" name="email" type="text" required="required">
        <input placeholder="Password" name="password" type="password" required="required">
        <button>Submit</button>
        {{csrf_field()}}
    </form>
</div>
