@if ($comment)
    @php ($x = 0)
    @foreach ($comment as $value)
        @if ($x < 5)
            <div class="comment">
                <div class="comment__images">
                    <img alt='' src="http://placehold.it/50x50">
                </div>
                <a href='#' class="comment__author"><span class="social-used"></span>{{ $value->user->name }}</a>
                <p class="comment__date">{{ $value->created_at }}</p>
                <p class="comment__message">{{ $value->description }}</p>
            </div>
        @else
            <div id='hide-comments' class="hide-comments">
                <div class="comment">
                    <div class="comment__images">
                        <img alt='' src="http://placehold.it/50x50">
                    </div>
                    <a href='#' class="comment__author"><span class="social-used"></span>{{ $value->user->name }}</a>
                    <p class="comment__date">{{ $value->created_at }}</p>
                    <p class="comment__message">{{ $value->description }}</p>
                </div>
            </div>
        @endif
        @php ($x++)
    @endforeach
    @if ($x > 5)
        <div class="comment-more">
            <a href="#" class="watchlist">{{ __('Show more comments') }}</a>
        </div>
    @endif
@endif