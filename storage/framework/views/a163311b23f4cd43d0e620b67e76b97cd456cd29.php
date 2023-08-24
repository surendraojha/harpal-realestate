<?php $__env->startSection('content'); ?>
    <div class="agency-detail-page">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h1>Agency Details</h1>
                </div>
                <div class="col-12 col-sm-12 col-d-8 col-lg-9 agency-detail-left">
                    <?php if($information->profile->photo): ?>
                    <?php
                        $photo_path = asset('uploads/' . $information->profile->photo);
                    ?>
                <?php else: ?>
                    <?php
                        $photo_path = asset('front/assets/imgs/user.webp');
                    ?>
                <?php endif; ?>

                    <img src="<?php echo e($photo_path); ?>" alt="">
                    <h2><?php echo e($information->name); ?></h2>
                    
                    <p><a href="#"><i class="fa fa-envelope"></i> <?php echo e($information->email); ?></a></p>
                    <p><a href="#"><i class="fa fa-phone-volume"></i> <?php echo e($information->phone); ?></a></p>
                    

                    <?php if($information->profile->website): ?>
                        <p><a href="<?php echo e($information->profile->website); ?>"><i class="fa fa-globe"></i>
                                <?php echo e($information->profile->website); ?></a></p>
                    <?php endif; ?>
                    <ul>
                        <?php if($information->profile->facebook): ?>
                            <li><a target="_blank" href="<?php echo e($information->profile->facebook); ?>"><i
                                        class="fab fa-facebook-f"></i></a></li>
                        <?php endif; ?>
                        <?php if($information->profile->twitter): ?>
                            <li><a target="_blank" href="<?php echo e($information->profile->twitter); ?>"><i
                                        class="fab fa-twitter"></i></a></li>
                        <?php endif; ?>

                        <?php if($information->profile->linkedin): ?>
                            <li><a target="_blank" href="<?php echo e($information->profile->linkedin); ?>"><i
                                        class="fab fa-linkedin-in"></i></a></li>
                        <?php endif; ?>

                        <?php if($information->profile->instagram): ?>
                            <li><a target="_blank" href="<?php echo e($information->profile->instagram); ?>"><i
                                        class="fab fa-instagram"></i></a></li>
                        <?php endif; ?>

                    </ul>
                    <h3>Description</h3>
                    <?php echo $information->profile->about_me; ?>

                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-3 agency-detail-right">
                    <h4>Contact Us</h4>
                    <form action="<?php echo e(route('front.contact-us')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        

                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <input type="text" id="contact_for" name="contact_for"
                                    value="<?php echo e(old('contact_for')); ?>"
                                    class="form-control"
                                        placeholder="Contact For" required>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="user_id" value="<?php echo e($information->id); ?>">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" class="form-control"
                                        placeholder="Your Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <input type="text" id="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control"
                                        placeholder="Email Address">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <input type="number" name="phone" value="<?php echo e(old('phone')); ?>" id="number" class="form-control"

                                    placeholder="Mobile Number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"
                                        placeholder="Description"><?php echo e(old('message')); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-send" type="submit">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front-new.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front-new/agency-detail.blade.php ENDPATH**/ ?>