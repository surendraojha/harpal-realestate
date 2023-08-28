    <div class="row">

        <?php $__currentLoopData = $fulfilled_properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 mb-4">
                <div class="singleenterBox">
                    <div class="row mb-2">
                        <div class="col-3">
                            <a href="<?php echo e(route('property.detail', $value->slug)); ?>" title="<?php echo e($value->title); ?>">
                                <img src="<?php echo e(asset('uploads/' . $value->featured_photo)); ?>" alt="<?php echo e($value->title); ?>">
                            </a>
                        </div>
                        <div class="col-8">
                            <div class="singleenterContent">
                                <div class="singleTitleBox">
                                    <h4>
                                        <?php echo e($value->title); ?>

                                    </h4>
                                    <span>
                                        #<?php echo e($value->ad_id); ?>

                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <form action="<?php echo e(route('my-property.destroy', $value->id)); ?>" method="post">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="trashBtn" type="submit"
                                    onclick="return confirm('Are You Sure You Want To Delete This Property?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="location">
                        <?php echo e($value->location->location); ?>

                    </div>
                    <div class="pricong">
                        <?php
                            $formatted_price = \App\Helpers\NumberHelper::formatnumber($value->price);
                        ?>
                        Rs. <?php echo e($formatted_price); ?>

                    </div>
                    <div class="removeBox mt-2">
                        <div class="row">
                            <div class="col-12">
                                Expired on : <?php echo e(date('d M,Y', strtotime($value->expiration_date))); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if (isset($component)) { $__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Pagination::class, ['informations' => $fulfilled_properties]); ?>
<?php $component->withName('pagination'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966)): ?>
<?php $component = $__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966; ?>
<?php unset($__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966); ?>
<?php endif; ?>

    </div>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front/property/fullfilled.blade.php ENDPATH**/ ?>