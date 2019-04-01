@extends('layout.frontend.frontend_master')

@section('page', __('404 page'))

@section('content')
        <div class="error-wrapper">
            <a href='index.html' class="logo logo--dark">
                <img alt='logo' src="images/logo-dark.png">
                <p class="slogan--dark">{{ __('fun to search, fun to watch') }}</p>
            </a>

            <div class="error">
                <img alt='' src='images/error.png' class="error__image">
                <h1 class="error__text">{{ __('sorry, but page can’t be found') }}</h1>
                <a href="{{ url('/home') }}" class="btn btn-md btn--warning">{{ __('return to homepage') }}</a>
            </div>
        </div>

        <div class="copy-bottom">
            <p class="copy">&copy; A.Movie, 2013. All rights reserved. Done by Olia Gozha</p>
        </div>
@endsection