<?php if(@$meta): ?>
    <?php $__env->startSection('title', $meta->meta_title); ?>

    <?php $__env->startSection('meta'); ?>
        <?php if (isset($component)) { $__componentOriginal9e7e63767b825622d7dc3bf0b4a081e03d0963d6 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MetaHead::class, ['meta' => $meta]); ?>
<?php $component->withName('meta-head'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e7e63767b825622d7dc3bf0b4a081e03d0963d6)): ?>
<?php $component = $__componentOriginal9e7e63767b825622d7dc3bf0b4a081e03d0963d6; ?>
<?php unset($__componentOriginal9e7e63767b825622d7dc3bf0b4a081e03d0963d6); ?>
<?php endif; ?>
    <?php $__env->stopSection(); ?>

<?php else: ?>

<?php $__env->startSection('title','Forget Password'); ?>

<?php endif; ?>
<?php $__env->startSection('content'); ?>


<section class="siteSec">
    <div class="container">
        <div class="row">
            <div class="col-md-6 signupleft">
                <div class="siteTitle mb-4">
                    <h3>
                       Welcome to Kotha Bhada
                    </h3>
                    <p>
                        Your Ultimate renting partner
                    </p>
                </div>
                <?php $__currentLoopData = $advertisement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($value->advertisement->link); ?>" target="_blank">
                    <img src="<?php echo e(asset('uploads/' . $value->advertisement->photo)); ?>" alt="">
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <ul class="signupMenu">
                    <li>
                        <a href="<?php echo e(route('front.page','terms-and-conditions')); ?>">
                            Terms and condition
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('front.page','privacy-policy')); ?>">
                            Privacy Policy
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('front.faq')); ?>">
                            FAQ'S
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 signupRight">
                <div class="ContactForm">
                    

                    <form action="<?php echo e(route('password.email')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="">
                            <h5 class="mb-2 text-center">
                                Forget Password
                            </h5>
                            <span class="d-block mb-4 text-center">
                               New to the site <a href="<?php echo e(route('front.register')); ?>">
                                    Register Now
                                </a>
                            </span>
                            <div class="form-floating customForm">
                                <input type="email" class="form-control" id="email"
                                name="email"
                                placeholder="admin@admin.com">
                                <label for="email">
                                    Email Address Or Username
                                </label>
                            </div>

                            <div class="customForm text-end">
   <button class="colorBtn" type="submit">
                                    Email Password Reset Link <i class="flaticon-right-arrow ps-2"></i>
                                </button>
                            </div>

                            
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>