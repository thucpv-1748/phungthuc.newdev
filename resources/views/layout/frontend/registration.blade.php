@extends('layout.frontend.frontend_master')

@section('page', __('login'))

@section('content')
    <!-- Main content -->
    <form id="login-form" class="login" method='post' novalidate=''>
        <p class="login__title">{{ __('Registration') }}<br><span class="login-edition">{{ __('welcome to A.Movie') }}</span></p>

        <div class="field-wrap">
            <input type='email' placeholder='{{ __('Email') }}' name='email' class="login__input" required>
            <input type='password' placeholder='{{ __('Password') }}' name='password' class="login__input" required>
            <input type='text' placeholder='{{ __('Name') }}' name='name' class="login__input" required>
            <input type='number' placeholder='{{ __('Phone') }}' name='phone' class="login__input">
            <input type='date' placeholder='{{ __('Date Of Birth') }}' name='date_of_birth' class="login__input">
        </div>
        {{ csrf_field() }}
        <div class="login__control">
            <button type='submit' class="btn btn-md btn--warning btn--wider">{{ __('registration') }}</button>
        </div>
    </form>
@endsection
