@extends('layout.frontend.frontend_master')

@section('page', __('Cinemas'))

@section('content')
    <!-- Main content -->
    <section class="container">
        <div class="col-sm-12">
            <h2 class="page-heading">{{ __('Cinemas') }}</h2>
            <div class="cinema-wrap">
                @if ($store)
                    @foreach ($store as $value)
                    <div class="col-xs-6 col-sm-3 cinema-item">
                        <div class="cinema">
                            <a href="#" class="cinema__images">
                                <img alt="" src="{{ asset(config('asset.img') . 'hallway.jpg') }}">
                                <span class="cinema-rating">5.0</span>
                            </a>
                            <a href="#" class="cinema-title">{{ $value->name }}</a>
                        </div>
                    </div>
                    @endforeach
                @endif
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
