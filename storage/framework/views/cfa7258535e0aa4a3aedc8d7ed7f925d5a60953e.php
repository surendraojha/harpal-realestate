<?php $__env->startSection('content'); ?>
    <div class="agent-section">
        <div class="container">

            <?php $__currentLoopData = $informations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row agent-rows">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <h1> <?php echo e($value->name); ?></h1>
                        <p><strong><?php echo e($value->profile->experience); ?> Years Experience</strong></p>
                        <p><?php echo $value->profile->about_me; ?></p>
                        <p><i class="fa fa-phone"></i> <?php echo e($value->phone); ?></p>
                        <p><i class="fa fa-envelope"></i> <?php echo e($value->email); ?></p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <?php if($value->profile->photo): ?>
                            <?php
                                $photo_path = asset('uploads/' . $value->profile->photo);
                            ?>
                        <?php else: ?>
                            <?php
                                $photo_path = asset('front/assets/imgs/user.webp');
                            ?>
                        <?php endif; ?>
                        <a href="<?php echo e(route('front.agent-detail',$value->email)); ?>">
                        <img src="<?php echo e($photo_path); ?>" alt="">

                    </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



            <?php if (isset($component)) { $__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Pagination::class, ['informations' => $informations]); ?>
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
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front-new.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front-new/agent-list.blade.php ENDPATH**/ ?>