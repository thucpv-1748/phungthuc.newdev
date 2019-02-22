<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>

    <link href="{{ URL::asset('css/backend/login.css') }}" rel="stylesheet" type="text/css">

</head>
<div class="form-login-admin">
    <form method="post">
        <h1>Login</h1>
        <input placeholder="Email" name="email" type="text" required="required">
        <input placeholder="Password" name="password" type="password" required="required">
        <button>Submit</button>
        {{csrf_field()}}
    </form>
</div>
