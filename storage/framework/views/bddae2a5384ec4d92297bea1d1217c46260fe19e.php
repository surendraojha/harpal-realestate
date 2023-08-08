

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

<?php $__env->startSection('title','Shift Home'); ?>

<?php endif; ?>

<?php $__env->startSection('content'); ?>
    <!-- Singhle page banner start -->
    <section class="bannerSec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bannerImg">
                        <img src="<?php echo e(asset('uploads/'.$setting->banner)); ?>" alt="Banner">
                        <div class="bannerCaption">
                            <div class="siteTitle mt-4">
                                <h1 class="bannerTitle">
                                    Shift home
                                </h1>
                                <i class="bannersubTitle">
                                    Ask For Quote
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <!-- Single page banner ends -->
    <!-- Lopgin signup Box -->
    <section class="dashboardSec shiftHomeSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 signupRight">
                    <div class="ContactForm moreDetailSignup">
                        <form action="<?php echo e(route('front.shifthome')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="row">

                                <div class="col-md-4">

                                    <?php echo $setting->shift_home_content; ?>


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

                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-12">
                                            <h6 class="text-center mb-3">
                                                Please fill all the details
                                            </h6>
                                        </div>




                                        <div class="col-md-12">
                                            <div class="form-floating customForm">
                                                <select class="form-select form-control" id="title" name="type"
                                                    aria-label="Floating label select example" required>
                                                    <option value="">Please select</option>
                                                    <option value="office" <?php echo e(old('type') == 'office' ? 'selected' : ''); ?>>Office</option>
                                                    <option value="house" <?php echo e(old('type') == 'house' ? 'selected' : ''); ?>>House</option>
                                                    <option value="studio" <?php echo e(old('type') == 'studio' ? 'selected' : ''); ?>>Studio</option>

                                                    <option value="apartment" <?php echo e(old('type') == 'apartment' ? 'selected' : ''); ?>>Apartment
                                                    </option>
                                                    <option value="flat" <?php echo e(old('type') == 'flat' ? 'selected' : ''); ?>>Flat</option>
                                                    <option value="other" <?php echo e(old('type') == 'other' ? 'selected' : ''); ?>>Other</option>
                                                </select>
                                                <label for="title">Type/Size</label>
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-6">
                                            <div class="form-floating customForm">
                                                <input type="text" class="form-control" id="pickup_address" placeholder="eg.John"
                                                    name="pick_up_location" value="<?php echo e(old('pick_up_location')); ?>" required>
                                                <label for="fName">
                                                    Pick Up Location
                                                </label>
                                            </div>
                                        </div>




                                        
                                        <div class="col-md-6">
                                            <div class="form-floating customForm">
                                                <input type="text" class="form-control" id="drop_address" placeholder="eg.John"
                                                    name="drop_off_location" value="<?php echo e(old('drop_off_location')); ?>" required>
                                                <label for="drop_address">
                                                    Drop Off Location
                                                </label>
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-6">
                                            <div class="form-floating customForm">
                                                <input type="tel" name="phone" class="form-control" value="<?php echo e(old('phone')); ?>"
                                                    id="pNumber" placeholder="eg. 98XXXXXXXX" required>
                                                <label for="pNumber">
                                                    Phone Number
                                                </label>
                                            </div>
                                        </div>


                                       <div class="col-md-6">
                                            <div class="form-floating customForm">
                                                <input type="email" name="email" class="form-control" value="<?php echo e(old('phone')); ?>"
                                                    id="email" placeholder="Enter Email" required>
                                                <label for="email">
                                                    email
                                                </label>
                                            </div>
                                        </div>

                                        <?php $__currentLoopData = $shift_home_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-6">
                                            <div class="form-floating customForm">
                                                    <div class="form-floating customForm sp-quantity">
                                                        <input type="hidden" name="item_id[]" value="<?php echo e($value->title); ?>">
                                                        <div class="sp-minus ddd">-</div>
                                                            <input type="number" class="form-control quntity-input" name="item_quantity[]"  id="pNumber" placeholder="eg.4" step="1" min="0" max="" value="0" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
                                                        <div class="sp-plus ddd">+</div>
                                                        <label for="pNumber">
                                                            No Of <?php echo e($value->title); ?>

                                                        </label>
                                                    </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <div class="col-md-6">
                                            <div class="customForm">
                                                <span class="radioTitle">
                                                    When
                                                </span>
                                                <div class="d-flex">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="when" type="radio"
                                                            value="Instant Booking" id="House">
                                                        <label class="form-check-label" for="House">
                                                            Instant Booking
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="when" type="radio"
                                                            value="Shedule For Later" id="Apartment" checked>
                                                        <label class="form-check-label" for="Apartment">
                                                            Shedule For Later
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="date-div">
                                            <div class="form-floating customForm">
                                                <input type="date" name="schedule_date" value="<?php echo e(old('schedule_date')); ?>"
                                                    class="form-control" id="sDate">
                                                <label for="sDate">
                                                    Shedule Date
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="time-div">
                                            <div class="form-floating customForm">
                                                <input type="time" name="schedule_time" value="<?php echo e(old('schedule_time')); ?>"
                                                    class="form-control" id="sDate">
                                                <label for="sDate">
                                                    Select Time
                                                </label>
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
                                        <div class="col-12 mt-4">
                                            <div class="form-floating">
                                                <textarea class="form-control"
                                                name="message"
                                                 placeholder="Leave a comment here" id="shiftMessage" style="height: 80px"></textarea>
                                                <label for="shiftMessage">Message</label>
                                            </div>
                                        </div>
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
                                        <div class="customForm">
                                            <button class="colorBtn ms-0">
                                                Ask For Quote
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


<?php $__env->startSection('script'); ?>
    <script>
        //script for plus minus


        $('input[type=radio][name=when]').change(function() {
            var checked = $('input[name="when"]:checked').val();


            if(checked=='Instant Booking'){
                $('#date-div').hide();
                $('#time-div').hide();
            }else{
                $('#date-div').show();
                $('#time-div').show();
            }
        });
        $(".ddd").on("click", function () {

        var $button = $(this);
        var oldValue = $button.closest('.sp-quantity').find("input.quntity-input").val();

        if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }

        $button.closest('.sp-quantity').find("input.quntity-input").val(newVal);

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kotha-bhada\resources\views/front/shift-home/index.blade.php ENDPATH**/ ?>