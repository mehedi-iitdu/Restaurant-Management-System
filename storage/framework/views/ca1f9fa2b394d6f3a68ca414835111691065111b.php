<?php $__env->startSection('content'); ?>

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Time Configurations</h2>
            </div>
        </div>
    </div>

    <!-- Content -->

    <?php if(isset($timeConfigs)): ?>

        <?php if(count($timeConfigs) < 1): ?>
            <div class="row">
                <div class="col-md-12" align="right">
                    <a href="<?php echo e(route('timeConfig.add', $code)); ?> " class="button border with-icon">Add Time Config <i class="sl sl-icon-plus"></i></a>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">

            <div class="col-md-12">
                <?php if(count($timeConfigs) < 1): ?>
                    <h4>No time configuration found.</h4>
                <?php else: ?>
                  <!-- Section -->
                  <div class="add-listing-section">
                    
                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3><i class="sl sl-icon-clock"></i> Opening Hours (<?php echo e(\App\Restaurant::where('code', $code)->first()->name); ?>)</h3>
                                </div>
                                <div class="col-md-6">
                                    <div align="right">
                                        <a href="<?php echo e(route('holidays.show', $code)); ?>" class="button">Holidays</a>   
                                    </div>  
                                </div>
                            </div>
                        </div>

                        <form method="POST" action="<?php echo e(route('timeConfig.update')); ?>">
                            <?php echo csrf_field(); ?>
                            
                            <input type="hidden" name="code" value="<?php echo e($code); ?>">
                            
                            <?php $__currentLoopData = $timeConfigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeConfig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="row opening-day">
                                    <div class="col-md-2"><h5><?php echo e($timeConfig->day); ?></h5></div>
                                    <div class="col-md-5">
                                        <select class="chosen-select" data-placeholder="Opening Time" name="opening_time[]">
                                            <option label="Opening Time"></option>
                                            <option value="Closed" <?php if($timeConfig->opening_time == 'Closed'): ?> <?php echo e('selected'); ?> <?php endif; ?>>Closed</option>
                                            <option value="01:00:00" <?php if($timeConfig->opening_time == '01:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>1 AM</option>
                                            <option value="02:00:00" <?php if($timeConfig->opening_time == '02:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>2 AM</option>
                                            <option value="03:00:00" <?php if($timeConfig->opening_time == '03:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>3 AM</option>
                                            <option value="04:00:00" <?php if($timeConfig->opening_time == '04:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>4 AM</option>
                                            <option value="05:00:00" <?php if($timeConfig->opening_time == '05:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>5 AM</option>
                                            <option value="06:00:00" <?php if($timeConfig->opening_time == '06:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>6 AM</option>
                                            <option value="07:00:00" <?php if($timeConfig->opening_time == '07:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>7 AM</option>
                                            <option value="08:00:00" <?php if($timeConfig->opening_time == '08:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>8 AM</option>
                                            <option value="09:00:00" <?php if($timeConfig->opening_time == '09:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>9 AM</option>
                                            <option value="10:00:00" <?php if($timeConfig->opening_time == '10:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>10 AM</option>
                                            <option value="11:00:00" <?php if($timeConfig->opening_time == '11:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>11 AM</option>
                                            <option value="12:00:00" <?php if($timeConfig->opening_time == '12:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>12 PM</option>  
                                            <option value="13:00:00" <?php if($timeConfig->opening_time == '13:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>1 PM</option>
                                            <option value="14:00:00" <?php if($timeConfig->opening_time == '14:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>2 PM</option>
                                            <option value="15:00:00" <?php if($timeConfig->opening_time == '15:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>3 PM</option>
                                            <option value="16:00:00" <?php if($timeConfig->opening_time == '16:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>4 PM</option>
                                            <option value="17:00:00" <?php if($timeConfig->opening_time == '17:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>5 PM</option>
                                            <option value="18:00:00" <?php if($timeConfig->opening_time == '18:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>6 PM</option>
                                            <option value="19:00:00" <?php if($timeConfig->opening_time == '19:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>7 PM</option>
                                            <option value="20:00:00" <?php if($timeConfig->opening_time == '20:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>8 PM</option>
                                            <option value="21:00:00" <?php if($timeConfig->opening_time == '21:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>9 PM</option>
                                            <option value="22:00:00" <?php if($timeConfig->opening_time == '22:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>10 PM</option>
                                            <option value="23:00:00" <?php if($timeConfig->opening_time == '23:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>11 PM</option>
                                            <option value="00:00:00" <?php if($timeConfig->opening_time == '0:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>12 AM</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <select class="chosen-select" data-placeholder="Closing Time" name="closing_time[]">
                                            <option label="Closing Time"></option>
                                            <option value="Closed" <?php if($timeConfig->closing_time == 'Closed'): ?> <?php echo e('selected'); ?> <?php endif; ?>>Closed</option>
                                            <option value="01:00:00" <?php if($timeConfig->closing_time == '01:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>1 AM</option>
                                            <option value="02:00:00" <?php if($timeConfig->closing_time == '02:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>2 AM</option>
                                            <option value="03:00:00" <?php if($timeConfig->closing_time == '03:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>3 AM</option>
                                            <option value="04:00:00" <?php if($timeConfig->closing_time == '04:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>4 AM</option>
                                            <option value="05:00:00" <?php if($timeConfig->closing_time == '05:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>5 AM</option>
                                            <option value="06:00:00" <?php if($timeConfig->closing_time == '06:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>6 AM</option>
                                            <option value="07:00:00" <?php if($timeConfig->closing_time == '07:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>7 AM</option>
                                            <option value="08:00:00" <?php if($timeConfig->closing_time == '08:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>8 AM</option>
                                            <option value="09:00:00" <?php if($timeConfig->closing_time == '09:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>9 AM</option>
                                            <option value="10:00:00" <?php if($timeConfig->closing_time == '10:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>10 AM</option>
                                            <option value="11:00:00" <?php if($timeConfig->closing_time == '11:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>11 AM</option>
                                            <option value="12:00:00" <?php if($timeConfig->closing_time == '12:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>12 PM</option>  
                                            <option value="13:00:00" <?php if($timeConfig->closing_time == '13:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>1 PM</option>
                                            <option value="14:00:00" <?php if($timeConfig->closing_time == '14:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>2 PM</option>
                                            <option value="15:00:00" <?php if($timeConfig->closing_time == '15:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>3 PM</option>
                                            <option value="16:00:00" <?php if($timeConfig->closing_time == '16:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>4 PM</option>
                                            <option value="17:00:00" <?php if($timeConfig->closing_time == '17:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>5 PM</option>
                                            <option value="18:00:00" <?php if($timeConfig->closing_time == '18:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>6 PM</option>
                                            <option value="19:00:00" <?php if($timeConfig->closing_time == '19:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>7 PM</option>
                                            <option value="20:00:00" <?php if($timeConfig->closing_time == '20:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>8 PM</option>
                                            <option value="21:00:00" <?php if($timeConfig->closing_time == '21:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>9 PM</option>
                                            <option value="22:00:00" <?php if($timeConfig->closing_time == '22:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>10 PM</option>
                                            <option value="23:00:00" <?php if($timeConfig->closing_time == '23:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>11 PM</option>
                                            <option value="00:00:00" <?php if($timeConfig->closing_time == '0:00:00'): ?> <?php echo e('selected'); ?> <?php endif; ?>>12 AM</option>
                                        </select>
                                    </div>
                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <!-- Day / End -->

                        <input type="submit" name="submit" class="button" value="Submit" style="margin-top: 20px;">

                        </form>

                    </div>
                      <!-- Section / End --> 

                <?php endif; ?>
            </div>
        </div>

    <?php endif; ?>

    <!-- Copyrights -->
    <div class="col-md-12">
        <div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>