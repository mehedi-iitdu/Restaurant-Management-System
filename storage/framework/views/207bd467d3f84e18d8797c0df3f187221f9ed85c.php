<?php $__env->startSection('content'); ?>

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Food Menu</h2>
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

    <?php if(isset($foodCategories)): ?>

    <div class="row">
        <div class="col-md-12">
            <?php if(count($foodCategories) < 1): ?>
                <div class="row">
                    <div class="col-md-8">
                        <h4>No food item found.</h4>  
                    </div>
                    <div class="col-md-4" align="right">
                        <a href="<?php echo e(route('fooditem.add', $code)); ?>" class="button border with-icon">Add <i class="sl sl-icon-plus"></i></a>
                    </div>
                </div>
            <?php else: ?>
                <div class="add-listing">
                    <div class="add-listing-section">
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-doc"></i>Pricing (<?php echo e(\App\Restaurant::where('code', $code)->first()->name); ?>)</h3>
                        </div>

                        <table id="pricing-list-container">
                            <tbody>
                                
                                <?php $__currentLoopData = $foodCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foodCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="pricing-list-item pricing-submenu">
                                        <td>
                                            <div class="fm-input" style="margin-right: 10px;"><input type="text" placeholder="" value="<?php echo e($foodCategory->name); ?>" disabled></div>

                                                
                                                <button href="#category-<?php echo e($foodCategory->id); ?>" class="button popup-with-zoom-anim" style="max-height: 44px;"><i class="sl sl-icon-note"></i></button>

                                                <div id="category-<?php echo e($foodCategory->id); ?>" class="zoom-anim-dialog mfp-hide small-dialog">
                                                    <div class="small-dialog-header">
                                                        <h3>Eidt Category</h3>
                                                    </div>
                                                    <div class="message-reply margin-top-0">
                                                        <form  method="POST" action="<?php echo e(route('food.category.update')); ?>">
                                                         <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="id" value="<?php echo e($foodCategory->id); ?>">
                                                            <input type="text" name="name" value="<?php echo e($foodCategory->name); ?>">
                                                            <input type="hidden" name="code" value="<?php echo e($code); ?>">
                                                            <button class="button">Save</button>  
                                                        </form>
                                                    </div>
                                                </div>


                                                <form method="POST" action="<?php echo e(route('food.category.delete')); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="id" value="<?php echo e($foodCategory->id); ?>">
                                                    <button class="button"><i class="sl sl-icon-close"></i></button>
                                                </form>  
                                        </td>
                                    </tr>

                                    <?php $__currentLoopData = $foodCategory->foodItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foodItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr class="pricing-list-item pattern ui-sortable-handle">
                                            <td>
                                                
                                                <div class="fm-input pricing-name"><input type="text" placeholder="" value="<?php echo e($foodItem->name); ?>" disabled></div>
                                                <div class="fm-input pricing-ingredients"><input type="text" placeholder="" value="<?php echo e($foodItem->description); ?>" disabled></div>
                                                <div class="fm-input pricing-price" style="margin-right: 10px;"><i class="data-unit">USD</i><input type="text" placeholder="" value="<?php echo e($foodItem->price); ?>" data-unit="Euro" disabled></div>

                                                <form method="POST" action="<?php echo e(route('fooditem.edit')); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="id" value="<?php echo e($foodItem->id); ?>">
                                                    <button class="button"><i class="sl sl-icon-note"></i></button>
                                                </form>

                                                <form method="POST" action="<?php echo e(route('fooditem.delete')); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="id" value="<?php echo e($foodItem->id); ?>">
                                                    <button class="button"><i class="sl sl-icon-close"></i></button>
                                                </form> 
                                                
                                            </td>
                                        </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                        

                    </div>
                </div>

            <?php endif; ?>

            <div class="add-listing">
                <div class="add-listing-section">
                    <a href="<?php echo e(route('fooditem.add', $code)); ?>" class="button">Add Item</a>
                    <a href="#test" class="button popup-with-zoom-anim">Add Category</a>
                </div>
            </div>
            
            <div id="test" class="zoom-anim-dialog mfp-hide small-dialog">
                <div class="small-dialog-header">
                    <h3>Add Category</h3>
                </div>
                <div class="message-reply margin-top-0">
                    <form  method="POST" action="<?php echo e(route('food.category.add')); ?>">
                     <?php echo csrf_field(); ?>
                        <input type="text" name="name" placeholder="Category Name">
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

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>