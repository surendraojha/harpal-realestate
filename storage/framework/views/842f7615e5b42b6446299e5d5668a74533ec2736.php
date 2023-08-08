


<?php if(@$meta): ?>

    <?php $__env->startSection('title',$meta->meta_title); ?>

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

<?php $__env->startSection('title',' Promote Details'); ?>


<?php endif; ?>

<?php $__env->startSection('css'); ?>
<style>
    @media(min-width:767.9px){
        .mobileNavi{
            display: none;
        }
        .desktop-visible{
            display: block;
        }
        .mobile-visible{
            display: none;
        }
    }
    @media(max-width:991.9px){
        .desktopNav,.bannerImg::after{
            display: none;
        }
        .mobileNavi{
            display: flex;
        }
        .desktop-visible{
            display: none;
        }
        .mobile-visible{
            display: block;
        }
    }
    .stepdesignSingle{
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    .stepdesignSingle .leftStep{
        height: 80px;
        max-width: 80px;
        background-color: rgb(221 242 240);
        color: #000;
        flex: 0 0 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        font-size: 18px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
   <!-- Site Footer start -->
    <!-- Lopgin signup Box -->
    <section class="siteSec">
        <div class="container">

        <?php if (isset($component)) { $__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\WideAd::class, ['ads' => $top_wide_advertisements]); ?>
<?php $component->withName('wide-ad'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3)): ?>
<?php $component = $__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3; ?>
<?php unset($__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3); ?>
<?php endif; ?>

            <div class="row">
                <div class="col-md-6 signupleft text-start">

                        <div class="card card-corner-md pricing-card">
                            <div class="px-4 pt-3 pb-2">
                                <h3 class="fw-normal opacity-7 mt-1 mb-4">
                                    Property Promote
                                </h3>


                                <div>
                                    <div class="pricing-table-price" data-total-price="29">

                                        <?php echo $setting->boost_description; ?>


                                    </div>
                                </div>


                            </div>
                    </div>
                </div>
                <div class="col-md-6 signupRight">
                    <div class="ContactForm">
                            <div class="">
                                <h5 class="mb-2 text-center">
                                    How to Promote
                                </h5>
                                <div class="stepDesign">
                                    <?php
                                        $count=1
                                    ?>
                                    <?php $__currentLoopData = $boost_steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="stepdesignSingle">
                                        <div class="leftStep">
                                            Step <?php echo e($count++); ?>.
                                        </div>
                                        <div class="rightStep">
                                            <?php echo e($value->title); ?>

                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="mt-4">

                                        <a href="<?php echo e(route('my-property.index')); ?>" class="btn btn-success text-white">Promote Now</a>
                                    </div>

                                </div>
                            </div>
                    </div>
                </div>



            </div>


        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kotha-bhada\resources\views/front/boost-detail.blade.php ENDPATH**/ ?>