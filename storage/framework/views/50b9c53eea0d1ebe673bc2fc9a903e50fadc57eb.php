
<section class="siteSec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="siteTitle">
                    <h3>
                       What our happy customer saying about our services.
                    </h3>
                </div>
            </div>

                <!-- Slider main container -->
                <div class="swiper" id="testSlider">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide">
                            <div class="singleTest">
                                <div class="testiIntro">
                                    <img src="<?php echo e(asset('uploads/'.$value->photo)); ?>" alt="<?php echo e($value->name); ?>">
                                    <div class="testiBox">
                                        <h6>
                                            <?php echo e($value->name); ?>

                                        </h6>
                                        <p>
                                            <?php echo e($value->activity); ?>

                                        </p>
                                    </div>
                                </div>
                                <div class="testContent">
                                    <p>
                                        <?php echo e($value->message); ?>

                                    </p>
                                    <div class="reviewBox">
                                        <?php for($i=1;$i<=5;$i++): ?>
                                            <?php if($i<=$value->rating): ?>
                                                <i class="fas fa-star filled"></i>
                                            <?php else: ?>
                                            <i class="fas fa-star"></i>

                                            <?php endif; ?>
                                        <?php endfor; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <!-- If we need navigation buttons -->
                    <div class="testimonailnavPrev swiper-button-prev"></div>
                    <div class="testimonailnavNext swiper-button-next"></div>

                </div>


        </div>
    </div>
</section>

<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front/includes/testimonial.blade.php ENDPATH**/ ?>