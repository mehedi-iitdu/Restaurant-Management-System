<?php $__env->startSection('content'); ?>

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-lg-12">
                <h2>Tables</h2>
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

    <!-- Content -->
    <div class="row">
        <div class="col-lg-12">
                <div class="col-lg-12">
                    <form method="POST" action="<?php echo e(route('tables.add.all')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="add-listing">
                            <div class="add-listing-section">
                                <div class="add-listing-headline">
                                    <h3><i class="sl sl-icon-doc"></i>Auto</h3>
                                </div>
                                <input type="hidden" name="code" value="<?php echo e($code); ?>">
                                <?php for($i = $min; $i <=$max; $i++): ?>
                                    <div class="row with-forms">
                                        <div class="col-md-6">
                                            <h5>Table Name</h5>
                                            <input type="text" name="name[]" required="true" value="Table <?php echo e($i); ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Capacity</h5>
                                            <input type="number" min="0" name="capacity[]" required="true" placeholder="0">
                                        </div>
                                    </div>
                                <?php endfor; ?>
                                <input type="submit" name="submit" class="button" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>                          
            </div>
        </div>
    </div>

    <!-- Copyrights -->
    <div class="col-lg-12">
        <div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>