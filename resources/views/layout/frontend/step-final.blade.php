@extends('layout.frontend.frontend_master')

@section('page', __('Final'))

@section('content')
        <!-- Main content -->
        <section class="container">
            <div class="order-container">
                <div class="order">
                    <img class="order__images" alt='' src="{{ url::asset('images/tickets.png') }}">
                    <p class="order__title">{{ __('Thank you') }}<br><span class="order__descript">{{ __('you have successfully purchased tickets') }}</span></p>
                </div>

                <div class="ticket">
                    <div class="ticket-position">
                        <div class="ticket__indecator indecator--pre"><div class="indecator-text pre--text">{{ __('online ticket') }}</div> </div>
                        <div class="ticket__inner">

                            <div class="ticket-secondary">
                                <span class="ticket__item">{{ __('Ticket number :') }}<strong class="ticket__number">{{ $order->id }}</strong></span>
                                <span class="ticket__item ticket__date">{{ date('d-m-Y', strtotime($order->timeShow->time_show)) }}</span>
                                <span class="ticket__item ticket__time">{{ date('H:i', strtotime($order->timeShow->time_show)) }}</span>
                                <span class="ticket__item">{{ __('Cinema') }}: <span class="ticket__cinema">{{ $order->timeShow->room->store->name }}</span></span>
                                <span class="ticket__item">{{ __('Fast Food') }}: <span class="ticket__hall">{{ $fastfood }}</span></span>
                                <span class="ticket__item ticket__price">{{ __('price') }}: <strong class="ticket__cost">{{ $order->final_price }}</strong></span>
                            </div>

                            <div class="ticket-primery">
                                <span class="ticket__item ticket__item--primery ticket__film">{{ __('Film') }}<br><strong class="ticket__movie">{{ $order->timeShow->film->title }}</strong></span>
                                <span class="ticket__item ticket__item--primery">{{ __('Sits') }}: <span class="ticket__place">{{ $sits }}</span></span>
                            </div>


                        </div>
                        <div class="ticket__indecator indecator--post"><div class="indecator-text post--text">{{ __('online ticket') }}</div></div>
                    </div>
                </div>

                <div class="ticket-control">
                    <a href="#" class="watchlist list--download">{{ __('Download') }}</a>
                    <a href="#" class="watchlist list--print">{{ __('Print') }}</a>
                </div>

            </div>
        </section>
@endsection

@section('javascript')
        <script type="text/javascript">
            $(document).ready(function() {
                $('.top-scroll').parent().find('.top-scroll').remove();
            });
        </script>
@endsection
