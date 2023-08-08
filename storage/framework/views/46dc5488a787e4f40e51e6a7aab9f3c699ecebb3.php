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

<?php $__env->startSection('title','Login'); ?>

<?php endif; ?>

<?php $__env->startSection('css'); ?>
    <style>
        @media(min-width:767.9px) {
            .mobileNavi {
                display: none;
            }

            .desktop-visible {
                display: block;
            }

            .mobile-visible {
                display: none;
            }
        }

        @media(max-width:991.9px) {

            .desktopNav,
            .bannerImg::after {
                display: none;
            }

            .mobileNavi {
                display: flex;
            }

            .desktop-visible {
                display: none;
            }

            .mobile-visible {
                display: block;
            }
        }

    </style>
<?php $__env->stopSection(); ?>



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

                <?php if (isset($component)) { $__componentOriginalba8595abb3c291c4b1e2318b513ad873d0dfaaea = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarAd::class, ['advertisement' => $side_bar_ad]); ?>
<?php $component->withName('sidebar-ad'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba8595abb3c291c4b1e2318b513ad873d0dfaaea)): ?>
<?php $component = $__componentOriginalba8595abb3c291c4b1e2318b513ad873d0dfaaea; ?>
<?php unset($__componentOriginalba8595abb3c291c4b1e2318b513ad873d0dfaaea); ?>
<?php endif; ?>

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
                    <form action="<?php echo e(route('front.login')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="">
                            <h5 class="mb-2 text-center">
                                Login
                            </h5>
                            <span class="d-block mb-4 text-center">
                               New to the site <a href="<?php echo e(route('front.register')); ?>">
                                    Register Now
                                </a>
                            </span>
                            <div class="form-floating customForm">
                                <input type="email" class="form-control" id="email"
                                name="email" value="<?php echo e(old('email')); ?>"
                                placeholder="yourname@email.com">
                                <label for="email">
                                    Email Address Or Username
                                </label>
                            </div>
                            <a href="<?php echo e(route('password.request')); ?>" class="d-block text-end">
                                Forgot Password
                            </a>
                            <div class="customForm form-floating">
                                <input type="password"  class="form-control" id="password"
                                name="password"
                                placeholder="*****">
                                <label for="password">
                                    Password
                                </label>
                            </div>
                            <div class="customForm">
                                <span class="termsandConditionText">
                                    We’ll text you to confirm your email. Standard message and data rates apply.
                                    <a href="<?php echo e(route('front.page','privacy-policy')); ?>">Privacy Policy</a>
                                </span>
                            </div>
                            <div class="customForm text-end">
                                <button class="colorBtn" type="submit">
                                   Continue <i class="flaticon-right-arrow ps-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="OrText">
                        <span>
                            OR
                        </span>
                    </div>
                    <div class="elseContinue">
                        <h6 class="">
                            Continue With
                        </h6>
                        <ul>
                            <li>
                                <a href="<?php echo e(route('login.facebook')); ?>" class="fbLogin">
                                   <?php if (isset($component)) { $__componentOriginal5445bfdaa9be6aa346a6f4e7bb23f2ea041681be = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FacebookLoginIcon::class, []); ?>
<?php $component->withName('facebook-login-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5445bfdaa9be6aa346a6f4e7bb23f2ea041681be)): ?>
<?php $component = $__componentOriginal5445bfdaa9be6aa346a6f4e7bb23f2ea041681be; ?>
<?php unset($__componentOriginal5445bfdaa9be6aa346a6f4e7bb23f2ea041681be); ?>
<?php endif; ?>
                                    Facebook
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('login.google')); ?>" class="googleLogin">
                                    <?php if (isset($component)) { $__componentOriginalfeb8fc082d4aafbfbefdfe04d2c3df407cb82d68 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GoogleLoginIcon::class, []); ?>
<?php $component->withName('google-login-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfeb8fc082d4aafbfbefdfe04d2c3df407cb82d68)): ?>
<?php $component = $__componentOriginalfeb8fc082d4aafbfbefdfe04d2c3df407cb82d68; ?>
<?php unset($__componentOriginalfeb8fc082d4aafbfbefdfe04d2c3df407cb82d68); ?>
<?php endif; ?>
                                    Google
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/auth/login.blade.php ENDPATH**/ ?>