@extends('layout.frontend.frontend_master')

@section('page', __('Cinemas'))

@section('content')
    <!-- Main content -->
    <section class="container">
        <div class="col-sm-12">
            <h2 class="page-heading">{{ __('Cinemas') }}</h2>
            <div class="cinema-wrap">
                <div class="row">
                    <div class="col-xs-6 col-sm-3 cinema-item">
                        <div class="cinema">
                            <a href='single-cinema.html' class="cinema__images">
                                <img alt='' src="http://placehold.it/525x525">
                                <span class="cinema-rating">5.0</span>
                            </a>
                            <a href="single-cinema.html" class="cinema-title">Marble Arch Odeon</a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 cinema-item name">
                        <div class="cinema">
                            <a href='single-cinema.html' class="cinema__images">
                                <img alt='' src="http://placehold.it/525x525">
                                <span class="cinema-rating">5.0</span>
                            </a>
                            <a href="single-cinema.html" class="cinema-title">Camden Town Odeon</a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 cinema-item name popularity">
                        <div class="cinema">
                            <a href='single-cinema.html' class="cinema__images">
                                <img alt='' src="http://placehold.it/525x525">
                                <span class="cinema-rating">5.0</span>
                            </a>
                            <a href="single-cinema.html" class="cinema-title">Camden Town Odeon</a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 cinema-item popularity">
                        <div class="cinema">
                            <a href='single-cinema.html' class="cinema__images">
                                <img alt='' src="http://placehold.it/525x525">
                                <span class="cinema-rating">5.0</span>
                            </a>
                            <a href="single-cinema.html" class="cinema-title">Camden Town Odeon</a>
                        </div>
                    </div>
                </div>

                <div class="adv-place"><img alt='' src="images/banners/film.jpg"></div>

                <div class="row">
                    <div class="col-xs-6 col-sm-3 cinema-item name">
                        <div class="cinema">
                            <a href='single-cinema.html' class="cinema__images">
                                <img alt='' src="http://placehold.it/525x525">
                                <span class="cinema-rating">5.0</span>
                            </a>
                            <a href="single-cinema.html" class="cinema-title">Marble Arch Odeon</a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 cinema-item popularity">
                        <div class="cinema">
                            <a href='single-cinema.html' class="cinema__images">
                                <img alt='' src="http://placehold.it/525x525">
                                <span class="cinema-rating">5.0</span>
                            </a>
                            <a href="single-cinema.html" class="cinema-title">Camden Town Odeon</a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 cinema-item name popularity">
                        <div class="cinema">
                            <a href='single-cinema.html' class="cinema__images">
                                <img alt='' src="http://placehold.it/525x525">
                                <span class="cinema-rating">5.0</span>
                            </a>
                            <a href="single-cinema.html" class="cinema-title">Camden Town Odeon</a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 cinema-item popularity">
                        <div class="cinema">
                            <a href='single-cinema.html' class="cinema__images">
                                <img alt='' src="http://placehold.it/525x525">
                                <span class="cinema-rating">5.0</span>
                            </a>
                            <a href="single-cinema.html" class="cinema-title">Camden Town Odeon</a>
                        </div>
                    </div>
                </div>

                <div class="adv-place"><img alt='' src="images/banners/film.jpg"></div>

                <div class="row">
                    <div class="col-xs-6 col-sm-3 cinema-item name">
                        <div class="cinema">
                            <a href='single-cinema.html' class="cinema__images">
                                <img alt='' src="http://placehold.it/525x525">
                                <span class="cinema-rating">5.0</span>
                            </a>
                            <a href="single-cinema.html" class="cinema-title">Marble Arch Odeon</a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 cinema-item">
                        <div class="cinema">
                            <a href='single-cinema.html' class="cinema__images">
                                <img alt='' src="http://placehold.it/525x525">
                                <span class="cinema-rating">5.0</span>
                            </a>
                            <a href="single-cinema.html" class="cinema-title">Camden Town Odeon</a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 cinema-item popularity">
                        <div class="cinema">
                            <a href='single-cinema.html' class="cinema__images">
                                <img alt='' src="http://placehold.it/525x525">
                                <span class="cinema-rating">5.0</span>
                            </a>
                            <a href="single-cinema.html" class="cinema-title">Camden Town Odeon</a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 cinema-item popularity">
                        <div class="cinema">
                            <a href='single-cinema.html' class="cinema__images">
                                <img alt='' src="http://placehold.it/525x525">
                                <span class="cinema-rating">5.0</span>
                            </a>
                            <a href="single-cinema.html" class="cinema-title">Camden Town Odeon</a>
                        </div>
                    </div>
                </div>

            </div>


            <div class="pagination paginatioon--full">
                <a href='#' class="pagination__prev">prev</a>
                <a href='#' class="pagination__next">next</a>
            </div>

        </div>
    </section>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            init_CinemaList();
        });
    </script>
@endsection