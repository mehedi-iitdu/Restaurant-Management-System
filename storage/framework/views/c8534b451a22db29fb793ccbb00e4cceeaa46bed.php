<?php $__env->startSection('content'); ?>

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
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

    <?php if(isset($restaurantTables)): ?>

    <div class="row">

        <div class="col-md-12">
            <?php if(count($restaurantTables) < 1): ?>
                <h4>No tables found.</h4>
            <?php else: ?>

                <div class="add-listing">
                    <div class="add-listing-section">
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-doc"></i>Tables List (<?php echo e(\App\Restaurant::where('code', $code)->first()->name); ?>)</h3>
                        </div>

                        <table id="pricing-list-container">
                            <tbody>
                                <?php $__currentLoopData = $restaurantTables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $restaurantTable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr class="pricing-list-item pattern ui-sortable-handle">
                                        <td>
                                            <div class="fm-input pricing-name"><input type="text" placeholder="" value="<?php echo e($restaurantTable->name); ?>" disabled></div>

                                            <div class="fm-input pricing-ingredients"><input type="text" placeholder="" value="<?php echo e($restaurantTable->capacity); ?>" disabled></div>

                                                <form method="POST" action="<?php echo e(route('tables.edit')); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="id" value="<?php echo e($restaurantTable->id); ?>">
                                                    <button class="button"><i class="sl sl-icon-note"></i></button>
                                                </form>

                                                <form method="POST" action="<?php echo e(route('tables.delete')); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="id" value="<?php echo e($restaurantTable->id); ?>">
                                                    <button class="button"><i class="sl sl-icon-close"></i></button>
                                                </form>  
                                        </td>
                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <a href="<?php echo e(route('tables.add', $code)); ?>" class="button">Add Table</a>

                    </div>
                </div>
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