<?php if($timeConfig->opening_time != 'Closed' || $timeConfig->closing_time != 'Closed'): ?>
	<?php for($time = strtotime($timeConfig->opening_time); $time <= strtotime($timeConfig->closing_time); $time = strtotime('+15 minutes', $time)): ?>
		<div class="time-option" onclick="timeSelect(this)">
			<input type="hidden" name="time" value="<?php echo e(date("H:i:s", $time)); ?>">
		    <div class="time-time">
		    	<?php if($time>=strtotime('13:00:00')): ?>
		    		<?php echo e(date("H:i", $time - strtotime('12:00:00'))); ?>

		    	<?php else: ?>
		    		<?php echo e(date("H:i", $time)); ?>

		    	<?php endif; ?>
		    </div>
		    <div class="day-part"><?php echo e(date("A", $time)); ?></div>
		    <div class="area-name"><?php echo e($timeConfig->restaurant->restaurant_type->name); ?></div>
		    <div class="price-info">
		        <div class="availability available">Available</div>
		    </div>
		</div>
	<?php endfor; ?>
<?php endif; ?>