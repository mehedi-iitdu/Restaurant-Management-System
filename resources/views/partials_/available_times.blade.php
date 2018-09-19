@if($timeConfig->opening_time != 'Closed' || $timeConfig->closing_time != 'Closed')
    @php
        $i = 0;
    @endphp
    @for($time = strtotime($timeConfig->opening_time); $time <= strtotime($timeConfig->closing_time); $time = strtotime('+15 minutes', $time))
            <option value="{{ date("H:i:s", $time) }}">{{ date("H:i:s", $time) }}</option>
        @php
            $i++;
        @endphp
    @endfor
@endif