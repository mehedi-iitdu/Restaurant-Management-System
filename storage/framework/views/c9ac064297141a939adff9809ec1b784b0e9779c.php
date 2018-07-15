<?php $__env->startSection('content'); ?>

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Holidays</h2>
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

    <?php if(isset($holidays)): ?>

    <div class="row">
        <div class="col-md-12">
            <?php if(count($holidays) < 1): ?>
                <div class="row">
                    <div class="col-md-8">
                        <h4>No holidays found.</h4>  
                    </div>
                </div>
            <?php else: ?>
                <div class="add-listing">
                    <div class="add-listing-section">
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-doc"></i>Holidays (<?php echo e(\App\Restaurant::where('code', $code)->first()->name); ?>)</h3>
                        </div>

                        <table id="pricing-list-container">
                            <tbody>
                                
                                <?php $__currentLoopData = $holidays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $holiday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="pricing-list-item pricing-submenu">
                                        <td>
                                            <div class="fm-input pricing-name" style="margin-right: 20px;"><input type="text" placeholder="" value="<?php echo e($holiday->purpose); ?>" disabled></div>

                                            <div class="fm-input pricing-ingredients" style="margin-right: 10px;"><input type="text" placeholder="" value="<?php echo e(date('m/d/Y', $holiday->date)); ?>" disabled></div>

                                                
                                            <button href="#holiday-<?php echo e($holiday->id); ?>" class="button popup-with-zoom-anim" style="max-height: 44px;"><i class="sl sl-icon-note"></i></button>

                                            <div id="holiday-<?php echo e($holiday->id); ?>" class="zoom-anim-dialog mfp-hide small-dialog">
                                                <div class="small-dialog-header">
                                                    <h3>Eidt Holiday</h3>
                                                </div>
                                                <div class="message-reply margin-top-0">
                                                    <form  method="POST" action="<?php echo e(route('holidays.update')); ?>">
                                                     <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="id" value="<?php echo e($holiday->id); ?>">
                                                        <input type="text" name="purpose" value="<?php echo e($holiday->purpose); ?>">
                                                        <input type="text" name="date" class="holiday-date" data-lang="en" data-large-mode="true" data-large-default="true" data-min-year="2018" data-max-year="2099" data-lock="from" value="<?php echo e(date('m/d/Y', $holiday->date)); ?>">
                                                        <input type="hidden" name="code" value="<?php echo e($code); ?>">
                                                        <button class="button">Save</button>  
                                                    </form>
                                                </div>
                                            </div>


                                            <form method="POST" action="<?php echo e(route('holidays.delete')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="id" value="<?php echo e($holiday->id); ?>">
                                                <button class="button"><i class="sl sl-icon-close"></i></button>
                                            </form>  
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>

            <?php endif; ?>

            <div class="add-listing">
                <div class="add-listing-section">
                    <a href="#test" class="button popup-with-zoom-anim">Add Holiday</a>
                </div>
            </div>
            
            <div id="test" class="zoom-anim-dialog mfp-hide small-dialog">
                <div class="small-dialog-header">
                    <h3>Add Holiday</h3>
                </div>
                <div class="message-reply margin-top-0">
                    <form  method="POST" action="<?php echo e(route('holidays.insert')); ?>">
                     <?php echo csrf_field(); ?>
                        <input type="text" name="purpose" placeholder="Purpose" required>
                        <input type="text" name="date" class="holiday-date" data-lang="en" data-large-mode="true" data-large-default="true" data-min-year="2018" data-max-year="2099" data-lock="from" required>
                        <input type="hidden" name="code" value="<?php echo e($code); ?>">
                        <button class="button">Save</button>  
                    </form>
                </div>
            </div>

        </div>
    </div>

    <?php endif; ?>

<!-- Copyrights -->
<div class="col-md-12">
    <div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/datedropper.js')); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.holiday-date').dateDropper();
        });
    </script> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>