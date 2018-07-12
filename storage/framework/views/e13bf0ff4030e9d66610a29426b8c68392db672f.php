<?php $__env->startSection('content'); ?>

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-lg-12">
                <h2>Food Menu</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
                <div class="col-lg-12">
                    <form method="POST" action="<?php echo e(route('fooditem.insert')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="add-listing">
                            <div class="add-listing-section">
                                <div class="add-listing-headline">
                                    <h3><i class="sl sl-icon-doc"></i>Item Details</h3>
                                </div>
                                
                                <input type="hidden" name="code" value="<?php echo e($code); ?>">

                                <div class="row with-forms">
                                    <div class="col-md-12">
                                        <h5>Food Category</h5>
                                        <select class="chosen-select-no-single" name="food_category_id" required="true">
                                            <?php $__currentLoopData = $foodCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foodCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($foodCategory->id); ?>"><?php echo e($foodCategory->name); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row with-forms">
                                    <div class="col-md-12">
                                        <h5>Name</h5>
                                        <input type="text" name="name" required="true">
                                    </div>
                                </div>
                                <div class="row with-forms">
                                    <div class="col-md-12">
                                        <h5>Descriptiom<span>(maximum 2000 characters)</span></h5>
                                        <textarea class="WYSIWYG" name="description" rows="2" id="description" spellcheck="true"></textarea>
                                    </div>
                                </div>
                                <div class="row with-forms">
                                    <div class="col-md-12">
                                        <h5>Price</h5>
                                        <input type="number" min="0" name="price" required="true">
                                    </div>
                                </div>
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