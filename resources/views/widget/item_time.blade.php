@if($timeConfig->opening_time != 'Closed' || $timeConfig->closing_time != 'Closed')
	@for($time = strtotime($timeConfig->opening_time); $time <= strtotime($timeConfig->closing_time); $time = strtotime('+15 minutes', $time))
		<div class="time-option" onclick="timeSelect(this)">
			<input type="hidden" name="time" value="{{ date("H:i:s", $time) }}">
		    <div class="time-time">
		    	@if($time>=strtotime('13:00:00'))
		    		{{ date("H:i", $time - strtotime('12:00:00')) }}
		    	@else
		    		{{ date("H:i", $time) }}
		    	@endif
		    </div>
		    <div class="day-part">{{ date("A", $time) }}</div>
		    <div class="area-name">{{ $timeConfig->restaurant->restaurant_type->name }}</div>
		    <div class="price-info">
		        <div class="availability available">Available</div>
		    </div>
		</div>
	@endfor
@endif