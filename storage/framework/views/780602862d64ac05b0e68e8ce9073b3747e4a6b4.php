<ul>
	<?php $__currentLoopData = $visitor_reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $visitor_review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<li>
		<div class="comments listing-reviews">
			<ul>
				<li>
					<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
					<div class="comment-content"><div class="arrow-comment"></div>
						<div class="comment-by"><?php echo e($visitor_review->user->name); ?> <div class="comment-by-listing">on <a href="#"><?php echo e($visitor_review->restaurant->name); ?></a></div> <span class="date"><?php echo e(date('d-m-Y',strtotime($visitor_review->date))); ?></span>
							<div class="star-rating" data-rating="5"></div>
						</div>
						<p><?php echo e($visitor_review->review_content); ?></p>
						
						<div class="review-images mfp-gallery-container">
							<a href="images/review-image-01.jpg" class="mfp-gallery"><img src="images/review-image-01.jpg" alt=""></a>
						</div>
						<a href="#small-dialog" class="rate-review popup-with-zoom-anim"><i class="sl sl-icon-action-undo"></i> Reply to this review</a>
					</div>
				</li>
			</ul>
		</div>
	</li>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>