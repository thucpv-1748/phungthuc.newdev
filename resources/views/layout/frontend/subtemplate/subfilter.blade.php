@switch ($type)
    @case ('film-category')
        @if ($category)
            @foreach ($category as $value)
                <li class="select__variant" data-value="{{ $value->title }}"><a href="{{ url('/category/' . $value->id) }}">{{ $value->title }}</a></li>
            @endforeach
        @endif
        @break
    @case ('film')
        @if ($film)
            @foreach ($film as $value)
                <li class="select__variant" data-value="{{ $value->title }}"><a href="{{ url('/film/' . $value->id) }}">{{ $value->title }}</a></li>
            @endforeach
        @endif
        @break
@endswitch
