

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

<?php $__env->startSection('title','Find Me Room'); ?>


<?php endif; ?>

<?php $__env->startSection('content'); ?>
<section class="siteSec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 signupleft">
                <div class="siteTitle mb-4">
                    <h1>
                       Find Your Dream Place
                    </h1>
                    <p>
                        Your Ultimate renting partner
                    </p>
                </div>
                

<?php if (isset($component)) { $__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\WideAd::class, ['ads' => $side_bar_ad]); ?>
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

            </div>
            <div class="col-md-7">
                <div class="contactFrom">
                    <form action="<?php echo e(route('front.contact-us.post')); ?>" method="post"
                     enctype="multipart/form-data">

                        <?php echo csrf_field(); ?>
                        <div class="ContactForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="customForm">
                                        <label for="">
                                            Your Full Name
                                        </label>
                                        <input type="text" name="name" required value="<?php echo e(old('name')); ?>" placeholder="eg. Ram Adhikari">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="customForm">
                                        <label for="">
                                            Your Phone Number
                                        </label>
                                        <input type="text" required name="phone" value="<?php echo e(old('phone')); ?>" placeholder="98XXXXXXX">
                                    </div>
                                </div>

                                
                                  <div class="col-md-6">
                                    <div class="customForm">
                                        <label for="">
                                            Email
                                        </label>
                                        <input type="email" required name="email" value="<?php echo e(old('email')); ?>"
                                         placeholder="Enter Your Email">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="customForm">
                                        <label for="locationType">Location</label>
                                        <select id="locationType" required name="location[]" class="formCustom locationSelect select2" multiple>

                                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->location); ?>"><?php echo e($value->location); ?></option>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="customForm">
                                        <div class="fieldBox">
                                            <label for="rentalType">Property type</label>
                                            <!-- Optgroups -->
                                            <select id="rentalType" required name="rental_type[]" class="formCustom rentalSelect select2" multiple>

                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <optgroup label="<?php echo e($value->title); ?>">
                                                    <?php $__currentLoopData = $value->subcategory->sortBy('order'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($v->title); ?>"><?php echo e($v->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </optgroup>


                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="customForm">
                                        <label for="">Tole/Area</label>
                                        <input type="text" name="total_area" required
                                        value="<?php echo e(old('total_area')); ?>"
                                        placeholder="eg. Samakhushi">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="customForm">
                                        <label for="">
                                            If any
                                        </label>
                                        <textarea name="message"

                                        id="" cols="30" rows="10" placeholder="Write a Message"><?php echo e(old('message')); ?></textarea>
                                    </div>
                                </div>



                                <?php if (isset($component)) { $__componentOriginaldeb61f628ca544e367b9ef08c7be21b6f139ca6e = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DepositSlip::class, []); ?>
<?php $component->withName('deposit-slip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldeb61f628ca544e367b9ef08c7be21b6f139ca6e)): ?>
<?php $component = $__componentOriginaldeb61f628ca544e367b9ef08c7be21b6f139ca6e; ?>
<?php unset($__componentOriginaldeb61f628ca544e367b9ef08c7be21b6f139ca6e); ?>
<?php endif; ?>

                                <div class="col-12 mt-3">
                                    <div class="alert alert-primary mb-0" role="alert">
                                        <div class="d-flex">
                                            <i class="fas fa-info pe-2"></i>
                                            <div class="waringBox">
                                                यदि तपाइँ कुनै एजेन्ट (dalay dai) सँग व्यवहार गर्नुहुन्छ र यस प्लेटफर्म बाहिर पैसा पठाउने  गर्नुहुन्छ भने kothabhada.com जिम्मेवार हुनेछैन।
                                                <br />
                                                Kothabhada.com will not be responsible if you deal with an agent  and transfer money outside of this platform.
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="customForm text-end">
                                        <button class="colorBtn" type="submit">
                                           Send <i class="flaticon-right-arrow ps-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kotha-bhada\resources\views/front/find-me-room.blade.php ENDPATH**/ ?>