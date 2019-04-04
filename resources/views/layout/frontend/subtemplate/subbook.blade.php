@if($data = $film->timeShow->where('time_show', '>=', date('Y-m-d', strtotime(now())))->where('time_show', '<',  date('Y-m-d', strtotime(now()->modify('+1 day'))))->groupBy('room_id'))
    @foreach($data as $key => $value)
        <div class="time-select__group">
            <div class="col-sm-3">
                <p class="time-select__place">{{ $room->findOrFail($key)->store->name }}</p>
            </div>
            <ul class="col-sm-6 items-wrap">
                @foreach($value as $time )
                    <li class="time-select__item" data-time='{{ $time->id }}'>{{ date('H:i', strtotime($time->time_show)) }}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
@endif