@extends('layout.frontend.frontend_master')

@section('page', __('login'))

@section('content')
    <!-- Main content -->
    <form id="login-form" class="login" method='post' novalidate=''>
        <p class="login__title">{{ __('sign in') }}<br><span class="login-edition">{{ __('welcome to A.Movie') }}</span></p>

        <div class="social social--colored">
            <a href='#' class="social__variant fa fa-facebook"></a>
            <a href='#' class="social__variant fa fa-twitter"></a>
            <a href='#' class="social__variant fa fa-tumblr"></a>
        </div>

        <p class="login__tracker">{{ __('or') }}</p>

        <div class="field-wrap">
            <input type='email' placeholder='{{ __('Email') }}' name='email' class="login__input">
            <input type='password' placeholder='{{ __('Password') }}' name='password' class="login__input">

            <input type='checkbox' id='#informed' class='login__check styled' name="remember" value="on">
            <label for='#informed' class='login__check-info'>{{ __('remember me') }}</label>
        </div>
        {{ csrf_field() }}
        <div class="login__control">
            <button type='submit' class="btn btn-md btn--warning btn--wider">{{ __('sign in') }}</button>
            <a href="#" class="login__tracker form__tracker">{{ __('Forgot password?') }}</a>
        </div>
    </form>
@endsection
