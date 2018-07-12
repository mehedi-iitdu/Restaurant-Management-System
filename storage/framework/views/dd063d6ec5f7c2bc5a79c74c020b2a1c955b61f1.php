<?php $__env->startSection('content'); ?>


<!-- Titlebar -->
<div id="titlebar">
	<div class="row">
		<div class="col-md-12">
			<h2>My Listings</h2>
		</div>
	</div>
</div>

<div class="row">
	<!-- Listings -->
	<div class="col-lg-12 col-md-12">
		<div class="dashboard-list-box margin-top-0">
			<h4><?php echo e($status); ?> Listings</h4>
			<ul>
				<?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li>
					<div class="list-box-listing">
						<div class="list-box-listing-img"><a href="#"><img src="images/listing-item-01.jpg" alt=""></a></div>
						<div class="list-box-listing-content">
							<div class="inner">
								<h3><a href="#"><?php echo e($restaurant->name); ?></a></h3>
								<span><?php echo e($restaurant->address); ?></span>
								<div class="star-rating" data-rating="3.5">
									<div class="rating-counter">(<?php echo e(count($restaurant->reviews)); ?> reviews)</div>
									<span class="star"></span>
									<span class="star"></span>
									<span class="star"></span>
									<span class="star half"></span>
									<span class="star empty"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="buttons-to-right">
						<a href="<?php echo e(route('restaurant.edit', $restaurant->code)); ?>" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
						<a href="#" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
					</div>
				</li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
	</div>
	<!-- Copyrights -->
	<div class="col-md-12">
		<div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
	</div>

</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>