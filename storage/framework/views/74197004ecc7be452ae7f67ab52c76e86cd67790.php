<?php $__env->startSection('content'); ?>

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Time Configuration</h2>
            </div>
        </div>
    </div>

    <!-- Notice
    <div class="row">
        <div class="col-md-12">
            <div class="notification success closeable margin-bottom-30">
                <p>Your listing <strong>Hotel Govendor</strong> has been approved!</p>
                <a class="close" href="#"></a>
            </div>
        </div>
    </div> -->


        <div class="row">
            <!-- Listings -->
            <div class="col-lg-12 col-md-12">
                <div class="dashboard-list-box margin-top-0">
                    <h4>Restaurant(s)</h4>
                    <ul>
                        <?php $__currentLoopData = Auth::user()->restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <div class="list-box-listing">
                                <div class="list-box-listing-img"><a href="#"><img src="images/listing-item-01.jpg" alt=""></a></div>
                                <div class="list-box-listing-content">
                                    <div class="inner">
                                        <h3><a href="#"><?php echo e($restaurant->name); ?></a></h3>
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <ul>
                                                    <?php $__currentLoopData = $restaurant->timeConfigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeConfig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($timeConfig->opening_time == 'Closed' || $timeConfig->closing_time == 'Closed'): ?>
                                                            <li><?php echo e($timeConfig->day.' Closed'); ?></li><br>
                                                        <?php else: ?>
                                                            <li><?php echo e($timeConfig->day.' '.date('h:i A', strtotime($timeConfig->opening_time)).'-'.date('h:i A', strtotime($timeConfig->closing_time))); ?></li><br>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <ul>
                                                    <?php $__currentLoopData = $restaurant->holidays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $holiday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($holiday->opening_time == 'Closed' || $holiday->closing_time == 'Closed'): ?>
                                                            <li><?php echo e($holiday->purpose.': Closed'); ?></li><br>
                                                        <?php else: ?>
                                                            <li><?php echo e($holiday->purpose.': '.date('h:i A', strtotime($holiday->opening_time)).'-'.date('h:i A', strtotime($holiday->closing_time))); ?></li><br>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="buttons-to-right">
                                <a href="<?php echo e(route('timeConfig.show', $restaurant->code)); ?>" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
                               
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>

<!-- Copyrights -->
<div class="col-md-12">
    <div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>